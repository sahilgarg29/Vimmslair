<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php wp_head(); ?>
	</head>
	<body class="bg-secondary">
		<header class="bg-primary">
			<div
				class="container flex items-center mx-auto justify-between text-white px-4 border-none"
			>
				<h1 class="font-bold text-[2rem] text-center">
					<a href="<?php 
            echo get_home_url();
          ?> ">
            <?php bloginfo('name'); ?>
          </a>
				</h1>

				<nav class="top-nav">
					<div class="flex justify-end md:hidden">
						<button class="p-4 flex items-center justify-center close-menu">
							<svg
								height="1.5rem"
								xmlns="http://www.w3.org/2000/svg"
								viewBox="0 0 320 512"
							>
								<path
									d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"
								></path>
							</svg>
						</button>
					</div>
					<?php
            wp_nav_menu(
              array(
                'theme_location' => 'primary-menu',
              )
            );
          
          ?>
				</nav>

				<button class="md:hidden open-menu">
					<svg
						height="1.75rem"
						fill="#fff"
						xmlns="http://www.w3.org/2000/svg"
						viewBox="0 0 448 512"
					>
						<path
							d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"
						></path>
					</svg>
				</button>
			</div>
		</header>