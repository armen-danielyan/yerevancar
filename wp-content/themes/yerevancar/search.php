<?php get_header(); ?>

    <main id="search-page">
        <section>
            <div class="row">

                <div class="col-sm-12">
                    <div class="row">
                        <?php if(have_posts()): while(have_posts()): the_post(); ?>

                            <div class="col-sm-3">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'large-thumb', array( 'class' => 'img-responsive' ) ); ?>
                                    <h5><?php the_title(); ?></h5>
                                </a>
                            </div>

                        <?php endwhile; endif; ?>
                    </div>
                </div>

            </div>
        </section>
    </main>

<?php get_footer(); ?>