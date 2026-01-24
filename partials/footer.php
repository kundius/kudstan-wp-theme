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
              <a href="<?php echo $group['link']; ?>" class="footer-social__item" target="_blank">
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

<div id="modal-callback" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container modal__container--default" role="dialog" aria-modal="true">

      <div class="modal__dialog">
        <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

        <div class="modal__title">Заказать звонок</div>

        <form
          action="<?php echo admin_url('admin-ajax.php'); ?>"
          class="modal-form"
          data-feedback-form
          data-feedback-form-goal=""
          data-feedback-form-action="feedback_form">
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce'); ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="Заказать звонок">

          <div class="modal-form__field">
            <label class="input-field">
              <span class="input-field__label">Ваш номер телефона<span>*</span></span>
              <input class="input-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>

          <div class="modal-form__errors" data-feedback-form-errors></div>

          <div class="modal-form__submit">
            <button type="submit" class="modal-form__submit-button">
              Отправить сообщение
            </button>
          </div>

          <div class="modal-form__rules">
            Нажимая «Отправить», вы подтверждаете, что ознакомились с <a href="/privacy-policy/">Политикой конфиденциальности</a> и даете согласие на <a href="/user-agreement/">Обработку персональных данных</a>
          </div>

          <div class="modal-form-success">
            <div class="modal-form-success__title">
              Сообщение успешно отправлено
            </div>
            <div class="modal-form-success__desc">
              Мы свяжемся с вами в ближайшее время
            </div>
            <button type="button" class="modal-form-success__close" data-feedback-form-reset>Закрыть</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<?php wp_footer(); ?>