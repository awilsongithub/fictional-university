

<?php get_header(); ?>

<!-- BANNER 
  dynamic with acf field group: img, title, subtitle
  query meta_key='page', meta_query key= page, compare == , value="name of this page"
-->
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);">
  </div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Past Events</h1>
    <p>A recap of our past events</p>
  </div>
</div>

<div class="container container--narrow page-section">

  <!-- EVENTS -->
  <?php
			$pastEvents = new WP_Query(array(
				'posts_per_page' => 1,
				'post_type' => 'event',
				'meta_key' => 'event_date',
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
				'meta_query' => onlyPastEvents()
      )); ?>

    <?php if( $pastEvents->have_posts() ) : while( $pastEvents->have_posts() ) : $pastEvents->the_post(); ?>

    <div class="event-summary">
      <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
        <span class="event-summary__month">
          <?php
          $eventDate = new DateTime(get_field('event_date'));
          echo $eventDate->format('M');
          ?>
        </span>
        <span class="event-summary__day">
          <?php echo $eventDate->format('d'); ?>
        </span>
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h5>
        <p class="d-inline">
          <?php echo getExcerpt(get_post()); ?>
          <a href="<?php the_permalink(); ?>" class="nu gray"> Learn more</a>
        </p>
      </div>
    </div>

    <?php endwhile; else : ?>
      <p>No past events found.</p>
    <?php endif; ?>

    <?php echo paginate_links(); ?>

</div>

<?php get_footer(); ?>