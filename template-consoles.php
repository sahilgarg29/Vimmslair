<?php
// Template Name: Console List
get_header(); ?>
<main class="container mx-auto px-4 mt-8">
<header class="mb-8">
  <h1>
    <?php the_title(); ?>
  </h1>
</header>

<section class="mb-8">
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 content-stretch">
					<!-- <div>
						<a href="#" class="card">
							<img
								src="https://romsfun.com/wp-content/uploads/2020/08/game-boy.png"
								alt="game boy"
							/>
							<h3>Game Boy (GB)</h3>
							<div>
								<span>160 Roms</span> |
								<span>79,877</span>
							</div>
						</a>
					</div> -->

          <?php 
            $terms = get_terms(
              array(
                  'taxonomy'   => 'console',
                  'hide_empty' => false,
              )
            );

            // Check if any term exists
            if ( ! empty( $terms ) && is_array( $terms ) ) {
              // Run a loop and print them all
              foreach ( $terms as $term ) { ?>
                  <div>
                    <a href="<?php echo esc_url( get_term_link( $term ) ) ?>" class="card">
                      <div class="flex items-center flex-grow-[1]">
                        <img src="<?php
                          echo get_field( 'thumbnail', $term->taxonomy . '_' . $term->term_id );
                        ?>" alt="" class="card-img">
                      </div>
                      <div class="flex flex-col items-center">
                        <h3><?php echo $term->name; ?></h3>
                        <div>
                          <span><?php echo $term->count; ?> Roms</span>
                        </div>
                      </div>
                    </a>    
                  </div>
                  
                  <?php
              }
            }
            ?>

					
				</div>
</section>


</main>

<?php get_footer(); ?>