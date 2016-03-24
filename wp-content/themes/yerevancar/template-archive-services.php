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
                <?php $servicesQuery = new WP_Query( array( 'post_type' => 'services' ) ); ?>
                <?php if($servicesQuery->have_posts()): while($servicesQuery->have_posts()): $servicesQuery->the_post(); ?>
                    <div class="row">
                        <div class="col-sm-2">
                            <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                        </div>

                        <div class="col-sm-10">
                            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e( 'More', 'yerevancar' ) ?></a>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
