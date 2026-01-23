<?php
/*
Template Name: Главная
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

    <section class="intro">
      <div class="container">
        <div class="intro-layout__logo">
          <img src="<?php bloginfo('template_url'); ?>/assets/logo-white-inline.svg" alt="" />
        </div>
        <?php if ($intro_title = carbon_get_the_post_meta('intro_title')): ?>
          <div class="intro-layout__title">
            <?php echo nl2br($intro_title); ?>
          </div>
        <?php endif; ?>
        <?php if ($intro_desc = carbon_get_the_post_meta('intro_desc')): ?>
          <div class="intro-layout__desc">
            <?php echo nl2br($intro_desc); ?>
          </div>
        <?php endif; ?>
        <?php if ($intro_link = carbon_get_the_post_meta('intro_link')): ?>
          <div class="intro-layout__more">
            <a href="<?php echo esc_attr($intro_link); ?>" class="intro-more">
              <span class="intro-more__text">
                Узнать больше
              </span>
              <span class="intro-more__icon">
                <span class="icon icon-arrow-right"></span>
              </span>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <?php get_template_part('partials/services'); ?>
    <?php get_template_part('partials/reviews'); ?>
    <?php get_template_part('partials/news'); ?>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>