<div class="preheader">
  <div class="container">
    <div class="preheader-layout">
      <div class="preheader-layout__body">
        <div class="preheader-email">
          <div class="preheader-email__icon">
            <span class="icon icon-mail"></span>
          </div>
          <div class="preheader-email__value">
            <?php echo carbon_get_theme_option('crb_theme_email'); ?>
          </div>
        </div>
        <div class="preheader-phone">
          <div class="preheader-phone__time">
            <?php echo carbon_get_theme_option('crb_theme_phone_time'); ?>
          </div>
          <div class="preheader-phone__number">
            <?php echo carbon_get_theme_option('crb_theme_phone_number'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="header-anchor" data-sticky-header-anchor></div>

<div class="header" data-sticky-header data-mobile-menu="closed">
  <div class="container">
    <div class="header-layout">
      <a href="/" class="header-logo">
        <img src="<?php bloginfo('template_url'); ?>/assets/logo.svg" alt="" />
      </a>

      <?php wp_nav_menu([
        'theme_location' => 'menu-main',
        'container' => null,
        'menu_class' => 'header-nav',
      ]); ?>

      <div class="header-phone">
        <div class="header-phone__number">
          <?php echo carbon_get_theme_option('crb_theme_phone_number'); ?>
        </div>
        <div class="header-phone__time">
          <?php echo carbon_get_theme_option('crb_theme_phone_time'); ?>
        </div>
      </div>

      <button type="button" class="header-callback" data-callback-button>
        <span class="header-callback__text">
          Заказать звонок
        </span>
        <span class="header-callback__icon">
          <span class="icon icon-chevron-right"></span>
          <span class="icon icon-phone"></span>
        </span>
      </button>

      <button type="button" class="header-toggle" data-mobile-menu-toggle>
        <span class="icon icon-menu"></span>
        <span class="icon icon-close"></span>
      </button>
    </div>
  </div>
</div>