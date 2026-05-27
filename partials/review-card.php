<article class="review-card">
  <?php if (has_post_thumbnail()): ?>
    <figure class="review-card__figure">
      <?php the_post_thumbnail(); ?>
    </figure>
  <?php endif; ?>
  <div class="review-card__body">
    <div class="review-card__header">
      <div class="review-card__title">
        <?php the_title(); ?>
      </div>
      <div class="review-card__introtext">
        <?php echo nl2br(carbon_get_the_post_meta('introtext')); ?>
      </div>
    </div>
    <div class="review-card__content-wrapper">
      <div class="review-card__content-preview">
        <?php the_content(); ?>
      </div>

      <div class="review-card__content-full" aria-hidden="true" tabindex="-1">
        <div class="review-card__content-full-inner">
          <?php the_content(); ?>
        </div>
      </div>

      <button type="button" class="review-card__toggle" aria-expanded="false">Показать полностью</button>
    </div>
  </div>
</article>