<?php get_header(); ?>

<div class="container">
   <div class="row">
      <main class="col-md-12">
         <?php
         if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <?php if (has_post_thumbnail()) : ?>
                  <div class="post-header-image mb-3">
                     <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
                  </div>
               <?php endif; ?>

               <article <?php post_class(); ?>>
                  <h1 class="fw-bold text-dark h3 mb-2"><?php the_title(); ?></h1>
                  
                  <div class="mb-3">
                  <span class="author-icon"><i class="fa fa-user-circle"></i></span>
                    <span class="fw-bold "><?php the_author(); ?></span> 
                    <span class="text-muted">| <?php echo get_the_date('M j, Y'); ?></span> 
                  </div>

                  <div class="post-content text-muted">
                     <?php the_content(); ?>
                  </div>
               </article>
         <?php endwhile;
         endif; ?>
      </main>
   </div>
   <hr class="my-4 border-top border-2 border-dark">
</div>

<?php get_footer(); ?>

