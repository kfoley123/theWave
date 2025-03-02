<?php get_header(); ?>

<main id="category-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12"> 
                <h2 class="fw-light"><?php single_cat_title(); ?></h2>
                <p class=""><?php echo category_description(); ?></p>

                <?php if (have_posts()) : ?>
                    <div class="post-list">
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="post"> 
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url('custom-size'); ?>" alt="<?php the_title(); ?>" class="img-fluid w-100 post-thumbnail mb-2">

                                    </a>
                                <?php endif; ?>

                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <div class="mb-3">
                                    <span class="author-icon"><i class="fa fa-user-circle"></i></span>
                                    <span class="fw-bold "><?php the_author(); ?></span> 
                                    <span class="text-muted">| <?php echo get_the_date('M j, Y'); ?></span> 
                                </div>
                                <div class="post-excerpt mb-5">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination text-center">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('&laquo; Previous', 'textdomain'),
                            'next_text' => __('Next &raquo;', 'textdomain'),
                        ));
                        ?>
                    </div>

                <?php else : ?>
                    <p>No posts found in this category.</p>
                <?php endif; ?>

                <hr class="my-4 border-top border-2 border-dark">
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
