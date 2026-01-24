<div class="offer">
  <?php if ($gallery = $args['fields']['gallery']): ?>
    <div class="offer__slideshow">
      <div class="slideshow" data-slideshow>
        <div class="slideshow__container">
          <?php $gallery_id = rand(); ?>
          <?php foreach ($gallery as $image): ?>
            <div class="slideshow__slide">
              <a href="<?php echo esc_attr(wp_get_attachment_url($image, 'full')); ?>" data-fslightbox="gallery-<?php echo $gallery_id; ?>">
                <?php echo wp_get_attachment_image($image, 'full'); ?>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="slideshow__nav" data-slideshow-nav>
          <button class="slideshow__prev embla-nav-button" type="button" data-slideshow-prev>
            <span class="icon icon-arrow-left"></span>
          </button>
          <button class="slideshow__next embla-nav-button" type="button" data-slideshow-next>
            <span class="icon icon-arrow-right"></span>
          </button>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($items = $args['fields']['items']): ?>
    <div class="offer__body">
      <?php foreach ($items as $item): ?>
        <div class="offer-item">
          <div class="offer-item__body">
            <?php if ($item['title']):  ?>
              <div class="offer-item__title">
                <?php echo nl2br($item['title']); ?>
              </div>
            <?php endif;  ?>
            <?php if ($item['content']):  ?>
              <div class="offer-item__content">
                <?php echo wpautop($item['content']); ?>
              </div>
            <?php endif;  ?>
          </div>
          <div class="offer-item__meta">
            <div class="offer-item__price-wrap">
              <?php if ($item['price']): ?>
                <div class="offer-item__price">
                  <?php echo $item['price']; ?>
                </div>
                <?php if ($item['unit']): ?>
                  <div class="offer-item__unit">
                    <?php echo $item['unit']; ?>
                  </div>
                <?php endif;  ?>
              <?php endif;  ?>
            </div>
            <?php if ($item['button_text']): ?>
              <div class="offer-item__order">
                <a href="<?php echo $item['button_link']; ?>" class="offer-item__order-button">
                  <?php echo $item['button_text']; ?>
                </a>
              </div>
            <?php endif;  ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
<div class="offer-shadow"></div>