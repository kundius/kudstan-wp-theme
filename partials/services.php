<?php if ($services = carbon_get_the_post_meta('services')): ?>
  <section class="services" data-services style="--total: <?php echo count($services); ?>">
    <div class="services-header">
      <div class="services-header__title">Выбирайте отдых для себя</div>
      <div class="services-header__nav" data-services-nav>
        <button class="services-header__prev embla-nav-button" type="button" data-services-prev>
          <span class="icon icon-arrow-left"></span>
        </button>
        <button class="services-header__next embla-nav-button" type="button" data-services-next>
          <span class="icon icon-arrow-right"></span>
        </button>
      </div>
    </div>
    <div class="services-list" data-services-list>
      <div class="services-list__container">
        <?php foreach ($services as $key => $service): ?>
          <div class="services-list__item<?php if ($key == floor(count($services) / 2)): ?> active<?php endif; ?>" data-services-item>
            <div
              class="services-item"
              style="--photo: url(<?php echo esc_attr(wp_get_attachment_url($service['photo'])); ?>);--shift: <?php echo esc_attr($service['shift'] ?: '0px'); ?>">
              <div class="services-item__header" data-services-item-header>
                <div class="services-item__header-inner">
                  <?php echo nl2br($service['short_name']); ?>
                </div>
              </div>
              <div class="services-item__content">
                <?php if ($full_name = $service['full_name']): ?>
                  <div class="services-item__full-name"><?php echo nl2br($full_name); ?></div>
                <?php endif; ?>
                <?php if ($content = $service['content']): ?>
                  <div class="services-item__desc"><?php echo nl2br($content); ?></div>
                <?php endif; ?>
                <?php if ($link = $service['link']): ?>
                  <div class="services-item__more">
                    <a href="<?php echo esc_attr($link); ?>" class="services-item__more-link">Подробнее</a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="services-list__nav" data-services-nav>
        <button class="services-list__prev embla-nav-button" type="button" data-services-prev>
          <span class="icon icon-arrow-left"></span>
        </button>
        <button class="services-list__next embla-nav-button" type="button" data-services-next>
          <span class="icon icon-arrow-right"></span>
        </button>
      </div>
    </div>
    <div class="services-dots" data-services-dots></div>
  </section>
<?php endif; ?>