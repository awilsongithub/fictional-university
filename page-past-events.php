<?php
get_header();
pageBanner();
?>

<div class="container container--narrow page-section">

  <?php
  $pastEvents = getPastEvents(); ?>

  <?php if ($pastEvents->have_posts()) : while ($pastEvents->have_posts()) : $pastEvents->the_post(); ?>
      <?php getPostSnippetWithDate(); ?>
    <?php endwhile;
  else : ?>
    <p>No past events found.</p>
  <?php endif; ?>

  <?php
  wp_reset_query();
  echo paginate_links(); ?>

</div>

<?php get_footer(); ?>