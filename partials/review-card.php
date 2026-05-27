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
      <?php
        $raw_content = apply_filters('the_content', get_the_content());
        $text_only = wp_strip_all_tags($raw_content);
        $threshold = 600; // approx characters to decide if we need preview
        $has_more = mb_strlen($text_only) > $threshold;
        if ($has_more) {
          $preview_text = wp_trim_words($text_only, 60, '...');
        } else {
          $preview_text = $raw_content;
        }
      ?>

      <div class="review-card__content-preview">
        <?php echo $preview_text; ?>
      </div>

      <div class="review-card__content-full" aria-hidden="true" tabindex="-1">
        <button type="button" class="review-card__close" aria-label="Свернуть">Свернуть</button>
        <div class="review-card__content-full-inner">
          <?php echo $raw_content; ?>
        </div>
      </div>

      <?php if ($has_more): ?>
        <button type="button" class="review-card__toggle" aria-expanded="false">Показать полностью</button>
      <?php endif; ?>
    </div>
  </div>
</article>