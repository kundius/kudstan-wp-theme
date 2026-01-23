<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <div class="flex-grow page-404-section">
      <div class="container">
        <div class="page-404-headline">
          <div class="page-404-headline__title">404</div>
          <div class="page-404-headline__desc">Страница не найдена</div>
        </div>
        <div class="page-404-body">
          <div class="page-404-body__desc">
            <div class="page-404-body__desc-cell">
              <strong>Наш телефон:</strong> {crb_theme_phone}
            </div>
            <div class="page-404-body__desc-cell">
              {crb_theme_working_hours_short},  {crb_theme_working_hours_pause}
            </div>
          </div>
          <div class="page-404-body__call">
            <button type="button" class="control-button" data-modal-open="modal-call">
              <span>Заказать звонок</span>
              <span class="icon icon-phone"></span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/modals'); ?>

    <?php wp_footer(); ?>
  </div>
</body>

</html>
