<?php get_header(); ?>

<main id="content" class="container mt-4">

    <?php
    // Get all categories
    $categories = get_categories();

    foreach ($categories as $category) :
        // Get latest 4 posts in this category
        $category_posts = new WP_Query([
            'cat' => $category->term_id,
            'posts_per_page' => 4
        ]);
    ?>

    <section class="category-section mb-5">
        <h3 class="mb-3 fw-light">
            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                <?php echo esc_html($category->name); ?>
            </a>
        </h3>


        <?php if ($category_posts->have_posts()) : $count = 0; ?>
            <div class="row">
                <?php while ($category_posts->have_posts()) : $category_posts->the_post(); ?>

                    <?php if ($count == 0) : ?>
                        <!-- Featured Post (Latest Post) -->
                        <div class="col-md-8">
                            <article class="featured-post mb-3">
                                <a href="<?php the_permalink(); ?>" class="d-block">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', ['class' => 'img-fluid mb-2']); ?>
                                    
                                    <?php endif; ?>
                                    <h5 class="fw-bold mt-2 px-2"><?php the_title(); ?></h5>
                                </a>
                                <div class="d-flex">
                                <span class="author-icon px-2"><i class="fa fa-user-circle"></i></span>
                                <p class="text-muted"><?php the_author(); ?></p>
                                </div>
                                
                            </article>
                        </div>
                    <?php else : ?>
                        <!-- Next 3 most recent posts -->
                        <?php if ($count == 1) : ?>
                            <div class="col-md-4">
                        <?php endif; ?>
                            <article class="regular-post pt-2 
                                    <?php if ($count == 2) echo 'border-1 border-top border-bottom border-dark pt-3 pb-3'; ?>
                                    <a href="<?php the_permalink(); ?> class="text-dark text-decoration-none">
                                        <h5 class="fw-bold"><?php the_title(); ?></h5>
                                    </a>
                                    <p class="text-muted small">By <?php the_author(); ?></p>
                            </article>
    
                        <?php if ($count == 3) : ?>
                            </div>
                        <?php endif; ?>
                        
                    <?php endif; ?>
                    
                    <?php $count++; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; wp_reset_postdata(); ?>
    </section>
    <hr class="my-4 border-top border-2 border-dark">

    <?php endforeach; ?>
</main>

<?php get_footer(); ?>
