<?php
$news = new WP_Query([
  'post_type' => 'post',
  'cat' => 5,
  'orderby' => [
    'is_sticky' => 'DESC',
    'date' => 'DESC',
  ],
  'posts_per_page' => 3,
]);
?>
<?php if ($news->have_posts()): ?>
  <section class="news" data-news>
    <div class="news-header">
      <div class="news-header__title">Новости</div>
      <div class="news-header__nav" data-news-nav>
        <button class="news-header__prev embla-nav-button" type="button" data-news-prev>
          <span class="icon icon-arrow-left"></span>
        </button>
        <button class="news-header__next embla-nav-button" type="button" data-news-next>
          <span class="icon icon-arrow-right"></span>
        </button>
      </div>
    </div>
    <div class="news-list" data-news-list>
      <div class="news-list__container">
        <?php while ($news->have_posts()): ?>
          <?php $news->the_post(); ?>
          <div class="news-list__item">
            <?php get_template_part('partials/news-card'); ?>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="news-list__nav" data-news-nav>
        <button class="news-list__prev embla-nav-button" type="button" data-news-prev>
          <span class="icon icon-arrow-left"></span>
        </button>
        <button class="news-list__next embla-nav-button" type="button" data-news-next>
          <span class="icon icon-arrow-right"></span>
        </button>
      </div>
    </div>
    <div class="news-footer">
      <a href="<?php echo esc_attr(get_category_link(5)); ?>" class="more-button">
        <span class="more-button__text">Смотреть все</span>
        <span class="more-button__icon">
          <span class="icon icon-arrow-right"></span>
        </span>
      </a>
    </div>
  </section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>