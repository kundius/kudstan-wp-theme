<?php
$reviews = new WP_Query([
  'post_type' => 'review',
  'orderby' => [
    'menu_order' => 'ASC',
  ],
  'posts_per_page' => -1,
  'meta_query' => [
    [
      'key' => 'at_home',
      'compare_key' => '=',
      'value' => 'yes',
    ],
  ],
]);
?>
<?php if ($reviews->have_posts()): ?>
  <section class="reviews" data-reviews>
    <div class="reviews-header">
      <div class="reviews-header__title">Люди говорят о нас</div>
      <div class="reviews-header__nav" data-reviews-nav>
        <button class="reviews-header__prev embla-nav-button" type="button" data-reviews-prev>
          <span class="icon icon-arrow-left"></span>
        </button>
        <button class="reviews-header__next embla-nav-button" type="button" data-reviews-next>
          <span class="icon icon-arrow-right"></span>
        </button>
      </div>
    </div>
    <div class="reviews-list" data-reviews-list>
      <div class="reviews-list__container">
        <?php while ($reviews->have_posts()): ?>
          <?php $reviews->the_post(); ?>
          <div class="reviews-list__item">
            <?php get_template_part('partials/review-card'); ?>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="reviews-list__nav" data-reviews-nav>
        <button class="reviews-list__prev embla-nav-button" type="button" data-reviews-prev>
          <span class="icon icon-arrow-left"></span>
        </button>
        <button class="reviews-list__next embla-nav-button" type="button" data-reviews-next>
          <span class="icon icon-arrow-right"></span>
        </button>
      </div>
    </div>
    <div class="reviews-footer">
      <a href="/review/" class="more-button">
        <span class="more-button__text">Смотреть все</span>
        <span class="more-button__icon">
          <span class="icon icon-arrow-right"></span>
        </span>
      </a>
    </div>
  </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>