<?php
/*
Template Name: Контакты
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="page-layout">
    <?php get_template_part('partials/header'); ?>

    <div class="page-layout__body">
      <div class="container">
        <ol class="breadcrumbs" itemscope="" itemtype="https://schema.org/BreadcrumbList" aria-label="Хлебные крошки">
          <li class="breadcrumbs__item" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <a class="breadcrumbs__link" itemprop="item" href="/">
              <span itemprop="name">Главная</span>
            </a>
            <meta itemprop="position" content="1">
          </li>
          <li class="breadcrumbs__item" itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
            <span class="breadcrumbs__text" itemprop="item" aria-current="page">
              <span itemprop="name">Контакты</span>
            </span>
            <meta itemprop="position" content="2">
          </li>
        </ol>

        <h1 class="page-title"><?php the_title(); ?></h1>

        <div class="page-content">
          <?php the_content(); ?>
        </div>

        <div class="contacts-layout">
          <?php if ($cards = carbon_get_the_post_meta('cards')): ?>
            <div class="contacts-cards">
              <?php foreach ($cards as $card): ?>
                <div class="contacts-card">
                  <div class="contacts-card__icon">
                    <img src="<?php echo esc_attr(wp_get_attachment_url($card['icon'])); ?>" alt="" />
                  </div>
                  <div class="contacts-card__name">
                    <?php echo $card['name']; ?>
                  </div>
                  <div class="contacts-card__content">
                    <?php echo wpautop($card['content']); ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>

          <div class="feedback">
            <div class="feedback__content">
              <div class="feedback__title">
                Обратная связь
              </div>
              <div class="feedback__desc">
                У вас есть вопросы или предложения?<br>
                Отправьте сообщение, мы с удовольствием выслушаем, ответим и посоветуем
              </div>
            </div>

            <div class="feedback__form">
              <form class="feedback-form"
                action="<?php echo admin_url('admin-ajax.php'); ?>"
                data-feedback-form
                data-feedback-form-goal=""
                data-feedback-form-action="feedback_form">
                <input type="hidden" name="submitted" value="">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce'); ?>">
                <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
                <input type="hidden" name="subject" value="Обратная связь">

                <div class="feedback-form__fields">
                  <div class="feedback-form__errors" data-feedback-form-errors=""></div>

                  <div class="feedback-form__input">
                    <div class="input-field">
                      <label for="name" class="input-field__label">Введите ваше имя</label>
                      <input type="text" id="name" name="name" class="input-field__input">
                    </div>
                  </div>

                  <div class="feedback-form__input">
                    <div class="input-field">
                      <label for="email" class="input-field__label">Введите ваш e-mail</label>
                      <input type="text" id="email" name="email" class="input-field__input">
                    </div>
                  </div>

                  <div class="feedback-form__input">
                    <div class="input-field">
                      <label for="phone" class="input-field__label">Введите ваш телефон*</label>
                      <input type="text" id="phone" name="phone" value="" data-maska="+ 7 (###) ### - ## - ##" placeholder="+ 7 (___) ___ - __ - __" required="" class="input-field__input">
                    </div>
                  </div>

                  <div class="feedback-form__textarea">
                    <div class="input-field">
                      <label for="message" class="input-field__label">Введите текст сообщения</label>
                      <textarea id="message" name="message" rows="1" class="input-field__textarea"></textarea>
                    </div>
                  </div>

                  <div class="feedback-form__required">
                    * - поля, обязательные для заполнения
                  </div>
                </div>

                <div class="feedback-form__actions">
                  <button type="submit" class="feedback-form__submit">
                    Отправить
                  </button>
                  <div class="feedback-form__rules">
                    Нажимая «Отправить», вы подтверждаете, что ознакомились с <a href="/privacy-policy/">Политикой конфиденциальности</a> и даете согласие на <a href="/user-agreement/">Обработку персональных данных</a>
                  </div>
                </div>

                <div class="feedback-form__success">
                  <div class="feedback-form__success-title">
                    Сообщение успешно отправлено
                  </div>
                  <div class="feedback-form__success-desc">
                    Мы свяжемся с вами в ближайшее время
                  </div>
                  <button type="button" class="feedback-form__success-close" data-feedback-form-reset="">Закрыть</button>
                </div>
              </form>
            </div>
          </div>

          <?php if ($map_code = carbon_get_the_post_meta('map_code')): ?>
            <div class="contacts-map">
              <?php echo $map_code; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>