<div id="car-sidebar">
    <div class="widget">
        <ul class="sidebar-menu">
            <?php
            $carTermId = (isset($_GET['cartype'])) ? (int)$_GET['cartype'] : icl_object_id(9, 'category', true);

            $carsArchiePageId = icl_object_id(251, 'cars', true);
            if(ICL_LANGUAGE_CODE == 'en') {
                $sidebarMenuID = 14;
            } elseif(ICL_LANGUAGE_CODE == 'ru') {
                $sidebarMenuID = 15;
            } else {
                $sidebarMenuID = 11;
            }
            $sidebarMenuItems = wp_get_nav_menu_items($sidebarMenuID);
            foreach($sidebarMenuItems as $sidebarMenuItem) {
                if($sidebarMenuItem->type == 'taxonomy') {
                    $termUrl = add_query_arg( array('cartype' => $sidebarMenuItem->object_id), get_the_permalink($carsArchiePageId) ); ?>
                    <li class="sidebar-menu-item <?php if($carTermId == $sidebarMenuItem->object_id && is_page_template( 'template-archive-cars.php' )) echo 'menu-item-active'; ?>"><a href="<?php echo $termUrl; ?>"><?php echo $sidebarMenuItem->title; ?></a></li>
                <?php }
            } ?>
        </ul>
    </div>

    <div class="widget">
        <h4><?php _e( 'News', 'yerevancar' ); ?></h4>
        <?php $rssUrl = 'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/autonews.ru/mainnews.rss';
        $xmlData = file_get_contents($rssUrl);
        $maxSize = 0;

        if($xmlData) {
            $xmlItems = new SimpleXMLElement($xmlData);
            if($xmlItems) { ?>
                <ul>
                    <?php foreach($xmlItems->channel->item as $item) { ?>
                        <li><a target="_blank" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
                        <?php if(++$maxSize == 3) break;
                    } ?>
                </ul>
            <?php }
        } ?>
        <a class="btn btn-primary" href="http://www.autonews.ru/news/" target="_blank"><?php _e( 'More', 'yerevancar' ); ?></a>
    </div>

    <div class="widget">
        <?php if(is_page_template( 'template-archive-cars.php' ) || is_singular( 'cars' )) {
            $postType = 'services';
        } elseif(is_page_template( 'template-archive-services.php' ) || is_singular( 'services' )) {
            $postType = 'cars';
        } ?>
        <h4>
            <?php if($postType == 'cars') {
                $postTypeArciveID = 251;
                _e( 'Cars', 'yerevancar' );
            } elseif($postType == 'services') {
                $postTypeArciveID = 260;
                _e( 'Services', 'yerevancar' );
            } ?>
        </h4>
        <ul>
            <?php $argsCarServices = array(
                'post_type'     => $postType,
                'showposts'     => 3
            );
            $carservicesQuery = new WP_Query($argsCarServices);
            if($carservicesQuery->have_posts()): while($carservicesQuery->have_posts()): $carservicesQuery->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        the_post_thumbnail( 'medium-thumb', array( 'class' => 'img-responsive' ) );
                        the_title();
                        ?>
                    </a>
                </li>
            <?php endwhile; endif; ?>
        </ul>
        <?php $archivePageId = icl_object_id($postTypeArciveID, $postType, true); ?>
        <a class="btn btn-primary" href="<?php echo get_permalink($archivePageId); ?>"><?php _e( 'More', 'yerevancar' ); ?></a>
    </div>

    <div class="widget">
        <h4><?php _e( 'Drivers', 'yerevancar' ); ?></h4>
        <ul>
            <?php $argsDrivers = array(
                'post_type'     => 'drivers',
                'showposts'     => 3
            );
            $driversQuery = new WP_Query($argsDrivers);
            if($driversQuery->have_posts()): while($driversQuery->have_posts()): $driversQuery->the_post(); ?>
                <li>
                    <?php the_post_thumbnail( 'medium-thumb', array( 'class' => 'img-responsive' ) ); ?>
                    <p><?php the_title(); ?></p>
                </li>
            <?php endwhile; endif; ?>
        </ul>
        <a class="btn btn-primary" href="<?php echo get_post_type_archive_link( 'drivers' ); ?>"><?php _e( 'All Drivers', 'yerevancar' ); ?></a>
    </div>
</div>

<?php wp_reset_query(); ?>