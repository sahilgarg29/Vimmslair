<footer class="mt-16">
			<nav class="bg-primary text-white">
				<div class="container mx-auto px-4 footer-menu">
        
        <?php
            wp_nav_menu(
              array(
                'theme_location' => 'footer-menu',
              )
            );
          
          ?>
				</div>
			</nav>
			<div class="bg-primaryDark text-white py-6">
				<div
					class="container mx-auto px-4 flex flex-col lg:flex-row gap-4 items-center justify-between"
				>
					<div><a href="#" class="text-[2rem] font-bold">
            <?php bloginfo('name'); ?>
          </a></div>
					<span class="text-center">
						Copyright © 2021 ROMSFUN.COM – All rights reserved
					</span>
					<div class="flex items-center gap-4">
						<a href="#"
							><svg
								height="16px"
								xmlns="http://www.w3.org/2000/svg"
								viewBox="0 0 320 512"
							>
								<path
									d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
								></path></svg
						></a>
						<a href="#"
							><svg
								height="16px"
								xmlns="http://www.w3.org/2000/svg"
								viewBox="0 0 320 512"
							>
								<path
									d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
								></path></svg
						></a>
						<a href="#"
							><svg
								height="16px"
								xmlns="http://www.w3.org/2000/svg"
								viewBox="0 0 320 512"
							>
								<path
									d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"
								></path></svg
						></a>
					</div>
				</div>
			</div>
		</footer>

    <?php wp_footer(); ?>
	</body>
</html>