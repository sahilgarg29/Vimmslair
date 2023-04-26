<?php get_header(); ?>

<section
			class="hero bg-cover min-h-[500px] flex items-center justify-center bg-no-repeat bg-center"
		>
			<div
				class="container flex flex-col gap-[3rem] items-center px-4 text-center"
			>
				<h1 class="text-white text-[2.5rem] font-bold">
					PLAY VIDEO GAME ROMS <br />
					ON YOUR COMPUTER OR PHONE
				</h1>
				<form method="get" action="<?php echo site_url("/") ?>" class="w-[100%] flex">
					<input
						type="search"
						name="s"
						id="search"
						placeholder="Enter ROM name for search"
						class="flex-grow-[1] rounded-[0.375rem] px-[1rem] py-[0.5rem] text-[1.25rem] rounded-tr-none rounded-br-none outline-none"
					/>
					<button class="btn btn-primary search-btn flex items-center gap-2 uppercase text-[1.25rem]">
          <svg height="20px" class="fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M508.5 468.9L387.1 347.5c-2.3-2.3-5.3-3.5-8.5-3.5h-13.2c31.5-36.5 50.6-84 50.6-136C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c52 0 99.5-19.1 136-50.6v13.2c0 3.2 1.3 6.2 3.5 8.5l121.4 121.4c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17zM208 368c-88.4 0-160-71.6-160-160S119.6 48 208 48s160 71.6 160 160-71.6 160-160 160z"></path></svg>
					  Search
					</button>
</form>
			</div>
</section>

    <main class="container px-4 mx-auto">
			<section
				class="mx-auto bg-white rounded shadow-lg mt-[3rem] px-6 pt-6 pb-6 mb-5"
			>
				<h2 class="mb-4">
          <?php the_title(); ?>
        </h2>
				<div class="text-[0.93rem] mb-4">
					<?php the_content(); ?>
				</div>
				
			</section>

			<section class="mb-8">
				<header class="flex items-center justify-between mb-4">
					<h2>Rom Consoles</h2>
					<a href="<?php echo get_permalink( get_page_by_path( 'consoles' ) ); ?>" class="btn btn-primary">VIEW ALL</a>
				</header>
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

      <section class="mb-8">
				<header class="flex items-center justify-between mb-4">
					<h2>Latest Roms</h2>
					<a href="<?php echo get_permalink( get_page_by_path( 'roms' ) ); ?>" class="btn btn-primary">VIEW ALL</a>
				</header>
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

            $args = [
              'post_type'  => 'roms',
              'post_status' => 'publish',
              'posts_per_page' => 15,
              'orderby' => 'post_date',
              'order' => 'DESC',
            ];
            $most_recent = new WP_Query( $args );
            if ( $most_recent->have_posts() ) {
              // The Loop
              while ( $most_recent->have_posts() ) { $most_recent->the_post();
                ?>

                  <div>
                    <a href="<?php the_permalink() ?>" class="card gap-4">
                      <div class="flex items-start">
                        <?php the_post_thumbnail(array(157, 200)) ?>
                      </div>
                      <div class="flex flex-col items-center flex-grow-[1] justify-between gap-2">
                        <h3 class="text-center text-[1rem]"><?php the_title() ?></h3>
                        <div>
												<span class="flex gap-2 items-center"><svg
              class="fill-primary" width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z"></path></svg> <?php the_field('downloads') ?></span>
                        </div>
                      </div>
                    </a>    
                  </div>

                
                <?php
              }
              // Restore original Post Data
              wp_reset_postdata();
            }

          ?>
				</div>
			</section>
		</main>
<?php get_footer(); ?>
