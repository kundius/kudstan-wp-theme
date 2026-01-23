<section class="footer">
  <div class="container">
    <div class="footer-layout">
      <div class="footer-layout__nav">
        <?php wp_nav_menu([
          'menu' => 'Меню в подвале',
          'container' => null,
          'menu_class' => 'footer-nav',
        ]); ?>
      </div>
      <div class="footer-layout__contacts">
        <div class="footer-contacts">
          <div class="footer-contacts__item">
            <div class="footer-contacts__item-ico">
              <span class="icon icon-phone"></span>
            </div>
            <div class="footer-contacts__item-val">
              <?php echo carbon_get_theme_option('crb_theme_phone_number'); ?>
            </div>
          </div>
          <div class="footer-contacts__item">
            <div class="footer-contacts__item-ico">
              <span class="icon icon-mail"></span>
            </div>
            <div class="footer-contacts__item-val">
              <?php echo carbon_get_theme_option('crb_theme_email'); ?>
            </div>
          </div>
          <div class="footer-contacts__item footer-contacts__item--address">
            <div class="footer-contacts__item-ico">
              <span class="icon icon-marker"></span>
            </div>
            <div class="footer-contacts__item-val">
              <?php echo carbon_get_theme_option('crb_theme_address'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-layout__no-oferta">
        <div class="footer-no-oferta">
          <?php echo carbon_get_theme_option('crb_footer_no_oferta'); ?>
        </div>
      </div>
      <div class="footer-layout__groups">
        <?php if ($groups = carbon_get_theme_option('crb_footer_groups')): ?>
          <div class="footer-social">
            <?php foreach ($groups as $group): ?>
              <a href="<?php echo $group['link']; ?>" class="footer-social__item">
                <?php echo $group['icon']; ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="footer-layout__copyright">
        <div class="footer-copyright">
          <?php echo carbon_get_theme_option('crb_footer_copyright'); ?>
        </div>
      </div>
      <div class="footer-layout__sitemap">
        <a href="/sitemap/" class="footer-link">Карта сайта</a>
      </div>
      <div class="footer-layout__privacy-policy">
        <a href="/privacy-policy/" class="footer-link">Политика конфиденциальности</a>
      </div>
      <div class="footer-layout__user-agreement">
        <a href="/user-agreement/" class="footer-link">Пользовательское соглашение</a>
      </div>
      <div class="footer-layout__counters">
        <div class="footer-counters">
          <?php echo carbon_get_theme_option('crb_footer_counters'); ?>
        </div>
      </div>
      <div class="footer-layout__creator">
        <a href="https://domenart-studio.ru/" class="footer-creator" target="_blank">
          <img src="<?php bloginfo('template_url'); ?>/assets/creator.png" alt="creator" width="138" height="30" />
        </a>
      </div>
    </div>
  </div>
</section>

<?php wp_footer(); ?>