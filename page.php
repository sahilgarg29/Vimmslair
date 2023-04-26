<?php get_header(); ?>

<main>
  <header class="container mx-auto px-4 mt-8 mb-8">
    <h1 class="text-[2rem] font-bold">
      <?php the_title(); ?>
    </h1>

    

  </header>

  <div class="container mx-auto px-4 mb-8">
    <?php the_content(); ?>
  </div>
</main>

<?php get_footer(); ?>