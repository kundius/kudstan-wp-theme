<article class="news-card">
  <?php if (has_post_thumbnail()): ?>
    <figure class="news-card__figure">
      <?php the_post_thumbnail('medium'); ?>
    </figure>
  <?php endif; ?>
  <div class="news-card__body">
    <div class="news-card__date">
      <?php echo get_the_date('d.m.Y'); ?>
    </div>
    <div class="news-card__title">
      <?php the_title(); ?>
    </div>
    <div class="news-card__desc">
      <?php the_excerpt(); ?>
    </div>
    <div class="news-card__footer">
      <a href="<?php the_permalink(); ?>" class="news-card__more">
        <span class="news-card__more-text">Подробнее</span>
        <span class="news-card__more-icon">
          <span class="icon icon-arrow-right"></span>
        </span>
      </a>
    </div>
  </div>
</article>