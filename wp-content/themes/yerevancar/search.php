<?php get_header(); ?>

    <main id="search-page">
        <section>
            <div class="row">

                <div class="col-sm-12">
                    <div class="row">
                        <h3 class="text-center"><?php _e( 'Search', 'yerevancar' ); echo ': ' . get_search_query(); ?></h3>

                        <?php if(have_posts()): while(have_posts()): the_post(); ?>

                            <div class="col-sm-3">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                                    <h5><?php the_title(); ?></h5>
                                </a>
                            </div>

                        <?php endwhile;
                        else: ?>
                            <h4 class="text-center"><?php _e( 'No Result Found', 'yerevancar' ); ?></h4>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </section>
    </main>

<?php get_footer(); ?>