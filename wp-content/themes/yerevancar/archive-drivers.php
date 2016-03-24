<?php get_header(); ?>

    <main id="archive-drivers-page">
        <section>
            <div class="row">

                <div class="col-sm-12">
                    <div class="row">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>

                            <div class="col-sm-4">
                                <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                                <h3><?php the_title(); ?></h3>
                            </div>

                        <?php endwhile; endif; ?>
                    </div>
                </div>

            </div>
        </section>
    </main>

<?php get_footer(); ?>