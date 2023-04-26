<?php get_header(); ?>

<div class="container mx-auto px-4 grid gap-6 mb-8 mt-8 grid-cols-7">
  <main class="flex-grow-[1] col-span-7 md:col-span-5">
    <div class="flex flex-col md:flex-row gap-6 bg-white rounded p-4 shadow-lg items-start mb-8">
      <div>
        <?php the_post_thumbnail(array(250, 500)) ?>
      </div>
      <div>
        <h1 class="text-[1.75rem] text-primary mb-4">
          <?php the_title(); ?>
        </h1>
        <table class="roms-table">
          <tr>
            <th>Console</th>
            <?php $term = get_the_terms( get_the_ID(), 'console' ) ?>
            <td> <a href="<?php echo get_term_link($term[0]) ?>"><?php echo $term[0]->name  ?></a></td>
          </tr>
          <tr>
            <th>Genre</th>
            <?php $terms = get_the_terms( get_the_ID(), 'genre' ) ?>

            <td>
              <?php foreach($terms as $term): ?>
                <a href="<?php echo get_term_link($term) ?>">
                  <?php echo $term->name  ?>
                </a>,
              <?php endforeach; ?>
            </td>
          </tr>

          <tr>
            <th>Region</th>
            <td><?php the_field('region') ?></td>
          </tr>
          <tr>
            <th>File Size</th>
            <td><?php the_field('file_size') ?></td>
          </tr>
          <tr>
            <th>Year of Release</th>
            <td><?php the_field('year_of_release') ?></td>
          </tr>
          <tr>
            <th>Downloads</th>
            <td><?php the_field('downloads') ?></td>
          </tr>
        </table>
      </div>
    </div>
    <div class="bg-white rounded shadow-lg p-6 flex justify-center mb-8">
      <a href="<?php the_field('download_link') ?>" class="flex w-[100%] max-w-[360px] p-2 bg-primary text-white rounded justify-center items-center gap-2 uppercase hover:bg-primaryDark transition-colors font-semibold text-[1rem]"
      
      >
        <svg height="20px" width="20px" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528 288h-92.1l46.1-46.1c30.1-30.1 8.8-81.9-33.9-81.9h-64V48c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v112h-64c-42.6 0-64.2 51.7-33.9 81.9l46.1 46.1H48c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V336c0-26.5-21.5-48-48-48zm-400-80h112V48h96v160h112L288 368 128 208zm400 256H48V336h140.1l65.9 65.9c18.8 18.8 49.1 18.7 67.9 0l65.9-65.9H528v128zm-88-64c0-13.3 10.7-24 24-24s24 10.7 24 24-10.7 24-24 24-24-10.7-24-24z"></path></svg>Download Now</a>
    </div>
    <div class="bg-white rounded shadow-lg p-6 flex mb-8">
      <?php the_content(); ?>
    </div>
  </main>
  <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>