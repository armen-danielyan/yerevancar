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
                    <?php $gal = 0;
                    $carsQuery = new WP_Query( array( 'post_type' => 'cars', 'posts_per_page' => -1 ) );
                    if($carsQuery->have_posts()): while($carsQuery->have_posts()): $carsQuery->the_post();
                        $postID = get_the_ID();
                        $galleryFullIds = get_post_meta($postID, '_YC_product_galleryfull_ids', true);
                        if($galleryFullIds) { ?>

                            <div class="col-sm-4">
                                <?php $galleryFullIdsArr = explode( ',', $galleryFullIds );
                                $i = 0;
                                foreach($galleryFullIdsArr as $galleryFullId) { ?>
                                    <a class="fancybox" title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" style="display:none" rel="<?php echo 'gallery' . $gal; ?>" href="<?php echo wp_get_attachment_image_src( $galleryFullId, 'extra-large-thumb' )[0]; ?>">
                                        <?php echo wp_get_attachment_image( $galleryFullId, 'large-thumb', false, array( 'class' => 'img-responsive' ) ); ?>
                                    </a>
                                    <?php $i++;
                                }
                                $thumbSrc = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'extra-large-thumb' ); ?>
                                <a class="fancybox" title="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" href="<?php echo $thumbSrc[0]; ?>" rel="<?php echo 'gallery' . $gal; ?>">
                                    <span class="gal-icon"></span>
                                    <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive gal-thumbnail' ) ); ?>
                                </a>
                                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                            </div>

                        <?php }
                        $gal++;
                    endwhile; endif; ?>
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
                this.title += '<br />';
                this.title += '<a href="' + $(this.element).data('url') + '" class="btn btn-primary"><?php _e( 'Order', 'yerevancar' ); ?></a>'
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

