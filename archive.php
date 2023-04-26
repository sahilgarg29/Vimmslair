<?php get_header(); ?>

<main class="container mx-auto px-4 mt-8">
  <header class="mb-8">
    <h1>
      <?php the_archive_title() ?>
    </h1>
  </header>

  <div class="mb-8">
    <form action="" method="get" class="flex items-center gap-8" >
      <div class="flex-grow-[1] flex">
        <input type="search" name="search" id="search" class="input input-left flex-grow-[1]" placeholder="Search" value="<?php echo get_search_query() ?>">
        <button type="submit" class="btn input-right">Search</button>
      </div>
      <select name="genre" id="genre" onchange="this.form.submit()" class="input">
        <option value="">Select Genre</option>
        <?php 
          $terms = get_terms(
            array(
                'taxonomy'   => 'genre',
                'hide_empty' => false,
            )
          );

          // Check if any term exists
          if ( ! empty( $terms ) && is_array( $terms ) ) {
            // Run a loop and print them all
            
            foreach ( $terms as $term ) { ?>
                <option value="<?php echo $term->slug; ?>" 
                <?php
                  if (isset($_GET['genre']) && $_GET['genre'] == $term->slug) {
                    echo 'selected';
                  }
                ?>
                ><?php echo $term->name; ?></option>
                <?php
            }
          }
        ?>
      </select>

      <select name="region" id="region" onchange="this.form.submit()" class="input">
        <option value="">Select Region</option>
        <option value="USA">USA</option>
        <option value="Europe">Europe</option>
        <option value="Japan">Japan</option>
        <option value="Asia">Asia</option>
        <option value="Russia">Russia</option>
        <option value="Australia">Australia</option>
        <option value="Brazil">Brazil</option>
        <option value="Canada">Canada</option>
        <option value="China">China</option>
        <option value="France">France</option>
        <option value="Germany">Germany</option>
        <option value="Italy">Italy</option>
        <option value="Korea">Korea</option>
        <option value="Mexico">Mexico</option>
        <option value="Spain">Spain</option>
        <option value="Taiwan">Taiwan</option>
        <option value="United Kingdom">United Kingdom</option>
      </select>
    </form>
  </div>

  <section class="mb-16">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 content-stretch">
    
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
      <div>
        <a href="<?php the_permalink() ?>" class="card gap-4">
          <div class="flex items-start">
            <?php the_post_thumbnail(array(157, 200)) ?>
          </div>
          <div class="flex flex-col items-center flex-grow-[1] justify-between gap-2">
            <h3 class="text-center text-[1rem] ">
              <?php the_title() ?>
            </h3>
            <div>
              <span class="flex gap-2 items-center"><svg
              class="fill-primary" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path></svg> <?php the_field('downloads') ?></span>
            </div>
          </div>
        </a>    
      </div>
  

      <?php endwhile; else: ?>
  
        <p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>
    </div>

    
  </section>

  <div class="mb-8 flex justify-center">
      <?php the_posts_pagination(); ?>
    </div>
</main>



<?php get_footer(); ?>
