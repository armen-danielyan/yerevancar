<?php
/**
 * Template Name: Archive Services
 */
?>

<?php get_header(); ?>

<main id="archive-services-page">
    <section>
        <div class="row">
            <div class="col-sm-2">
                <?php include( 'custom-sidebar.php' ); ?>
            </div>

            <div class="col-sm-10" id="serv-cont">
                <div class="row">
                    <?php $servicesQuery = new WP_Query( array( 'post_type' => 'services' ) ); ?>
                    <?php if($servicesQuery->have_posts()): while($servicesQuery->have_posts()): $servicesQuery->the_post(); ?>
                        <div class="col-md-4">

                            <div class="serviceItem">
                                <span class="service-item-title"><?php the_title(); ?></span>
                                <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                                <div class="mask">
                                    <h2><?php the_title(); ?></h2>
                                    <p></p>
                                    <a href="<?php the_permalink(); ?>" class="info"><?php _e( 'More', 'yerevancar' ) ?></a>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
