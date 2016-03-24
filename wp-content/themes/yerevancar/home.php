<?php
/**
 * Template Name: home
 */
?>

<?php get_header(); ?>

<main id="home-page">
    <section>
        <div class="row">
            <div class="col-md-12">
                <?php putRevSlider( 'homepage' ); ?>
            </div>
        </div>
    </section>

    <section class="sections-for-services clearfix">
            <div class="col-sm-6 services-section servics-left">
                <?php $archiveCarsPageId = icl_object_id(251, 'cars', true); ?>
                <a class="btn cars-service" href="<?php echo get_permalink($archiveCarsPageId); ?>"><?php echo get_the_title($archiveCarsPageId); ?></a>
            </div>

            <div class="col-sm-6 services-section servics-right">
                <?php $archiveServicesPageId = icl_object_id(260, 'services', true); ?>
                <a class="btn choose-service" href="<?php echo get_permalink($archiveServicesPageId); ?>"><?php echo get_the_title($archiveServicesPageId); ?></a>
            </div>
    </section>
</main>

<?php get_footer(); ?>