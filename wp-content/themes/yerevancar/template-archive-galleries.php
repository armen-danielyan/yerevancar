<?php
/**
 * Template Name: Archive Galleries
 */
?>

<?php get_header(); ?>

<main id="gallery-cars-page">
    <section>
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center"><?php _e( 'Gallery', 'yerevancar' ); ?></h1>
                <div class="row">
                    <!--Wedding photos gallery-->
                    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                    $gal = 0;
                    $galleriesArchiveArgs = array(
                        'post_type'         => 'cars',
                        'posts_per_page'    => 6,
                        'paged'             => $paged,
                        'meta_query'        => array(
                            array(
                                'key'       => '_YC_product_galleryfull_ids',
                                'compare'   => 'EXISTS'
                            )
                        )
                    );
                    $galleryQuery = new WP_Query( $galleriesArchiveArgs );
                    if($galleryQuery->have_posts()): while($galleryQuery->have_posts()): $galleryQuery->the_post();
                        $postID = get_the_ID();
                        $galleryFullIds = get_post_meta($postID, '_YC_product_galleryfull_ids', true);
                        if($galleryFullIds) { ?>

                            <div class="col-sm-4">
                                <?php $galleryFullIdsArr = explode( ',', $galleryFullIds );
                                $thumbID = get_post_thumbnail_id( $postID );
                                $galleryFullIdsArr = array_diff( $galleryFullIdsArr, array($thumbID) );
                                $i = 0;
                                foreach($galleryFullIdsArr as $galleryFullId) { ?>
                                    <a class="fancybox" title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" style="display:none" rel="<?php echo 'gallery' . $gal; ?>" href="<?php echo wp_get_attachment_image_src( $galleryFullId, 'extra-large-thumb' )[0]; ?>">
                                        <?php echo wp_get_attachment_image( $galleryFullId, 'large-thumb', false, array( 'class' => 'img-responsive' ) ); ?>
                                    </a>
                                    <?php $i++;
                                }
                                $thumbSrc = wp_get_attachment_image_src( $thumbID, 'extra-large-thumb' ); ?>
                                <a class="fancybox" title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" href="<?php echo $thumbSrc[0]; ?>" rel="<?php echo 'gallery' . $gal; ?>">
                                    <span class="gal-icon"></span>
                                    <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive gal-thumbnail' ) ); ?>
                                </a>
                                <h4><?php the_title(); ?></h4>
                            </div>

                        <?php }
                        $gal++;
                    endwhile; ?>

                        <?php
                        if($paged == $galleryQuery->max_num_pages){
                            $additionslPostsIds = array(717, 854);
                            foreach($additionslPostsIds as $additionslPostId){
                                $gal++;
                                $weddingPhotosPostId = icl_object_id($additionslPostId, 'post', true);
                                $weddingPhotosPostContent = get_post_field('post_content', $weddingPhotosPostId);
                                $patt = '';
                                preg_match_all( '/^\[.*ids="(.+)".*\]$/', $weddingPhotosPostContent, $res );
                                $galleryFullIdsArr = explode( ',', $res[1][0]);
                                ?>
                                <div class="col-sm-4">
                                    <?php
                                    $i = 0;
                                    foreach($galleryFullIdsArr as $galleryFullId) { ?>
                                        <a class="fancybox" title="<?php echo get_the_title($weddingPhotosPostId); ?>" style="display:none" rel="<?php echo 'gallery' . $gal; ?>" href="<?php echo wp_get_attachment_image_src( $galleryFullId, 'extra-large-thumb' )[0]; ?>">
                                            <?php echo wp_get_attachment_image( $galleryFullId, 'large-thumb', false, array( 'class' => 'img-responsive' ) ); ?>
                                        </a>
                                        <?php $i++;
                                    }
                                    $thumbSrc = wp_get_attachment_image_src( get_post_thumbnail_id( $weddingPhotosPostId ), 'extra-large-thumb' ); ?>
                                    <a class="fancybox" title="<?php echo get_the_title($weddingPhotosPostId); ?>" href="<?php echo $thumbSrc[0]; ?>" rel="<?php echo 'gallery' . $gal; ?>">
                                        <span class="gal-icon"></span>
                                        <?php echo get_the_post_thumbnail( $weddingPhotosPostId, 'large-thumb', array( 'class' => 'img-responsive gal-thumbnail' ) ); ?>
                                    </a>
                                    <h4><?php echo get_the_title($weddingPhotosPostId); ?></h4>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <div class="row">
                            <div class="col-sm-12"><?php pagination($galleryQuery->max_num_pages); ?></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
jQuery(document).ready(function ($) {
    $(".fancybox").fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        beforeShow: function () {
            if (this.title) {
                if($(this.element).data('url')) {
                    this.title += '<br />';
                    this.title += '<a href="' + $(this.element).data('url') + '" class="btn btn-primary"><?php _e('Order', 'yerevancar'); ?></a>'
                }
            }
        },
        helpers: {
            title: {
                type: 'inside'
            },
            buttons: {}
        }
    });
});
</script>

<?php get_footer(); ?>