<?php get_header(); ?>

    <main id="single-services-page">
        <section>
            <div class="row">
                <div class="col-sm-2">
                    <?php include( 'custom-sidebar.php' ); ?>
                </div>

                <div class="col-sm-4">
                    <div id="car-gallery">
                        <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                    </div>
                </div>

                <div class="col-sm-6">
                    <h2><?php the_title(); ?></h2>
                    <div><?php the_content(); ?></div>
                    <?php
                    $postID = get_the_ID();
                    $servicePriceSingle = get_post_meta($postID, '_YC_services_price', true);
                    if($servicePriceSingle) { ?>
                        <h3><?php echo __( 'Price:', 'yerevancar' ) . ' ' . $servicePriceSingle; ?></h3>
                    <?php } ?>

                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>