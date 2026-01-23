<?php if ($list = $args['fields']['list']): ?>
  <div class="prices-list">
    <?php foreach ($list as $item): ?>
      <div class="prices-item">
        <?php if ($gallery = $item['gallery']): ?>
          <div class="prices-item__slideshow">
            <div class="slideshow" data-slideshow>
              <div class="slideshow__container">
                <?php foreach ($gallery as $image): ?>
                  <div class="slideshow__slide">
                    <?php echo wp_get_attachment_image($image, 'full'); ?>
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

        <div class="prices-item__body">
          <?php if ($item['title'] || $item['content']):  ?>
            <div class="prices-item__desc">
              <?php if ($item['title']):  ?>
                <div class="prices-item__title">
                  <?php echo nl2br($item['title']); ?>
                </div>
              <?php endif;  ?>
              <?php if ($item['content']):  ?>
                <div class="prices-item__content">
                  <?php echo nl2br($item['content']); ?>
                </div>
              <?php endif;  ?>
            </div>
          <?php endif;  ?>
          <div class="prices-item__data">
            <?php if ($item['name'] || $item['introtext']):  ?>
              <div class="prices-item__data-content">
                <?php if ($item['name']):  ?>
                  <div class="prices-item__name">
                    <?php echo nl2br($item['name']); ?>
                  </div>
                <?php endif;  ?>
                <?php if ($item['introtext']):  ?>
                  <div class="prices-item__introtext">
                    <?php echo nl2br($item['introtext']); ?>
                  </div>
                <?php endif;  ?>
              </div>
            <?php endif;  ?>
            <div class="prices-item__data-estimate">
              <div class="prices-item__price">
                <?php echo $item['price']; ?>
              </div>
              <div class="prices-item__unit">
                <?php echo $item['unit']; ?>
              </div>
              <button type="button" class="prices-item__order">
                Забронировать
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="prices-item-shadow"></div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>