<?php
get_header();
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our world'
));
?>

<div class="container container--narrow page-section">

  <?php while (have_posts()) : the_post(); ?>
    <?php getPostSnippetWithDate(); ?>
  <?php endwhile;
  echo paginate_links();
  ?>

  <a href="<?php echo site_url('/past-events'); ?>" class="nu gray p-l-20">
    View Past Events
  </a>

</div>

<?php get_footer(); ?>