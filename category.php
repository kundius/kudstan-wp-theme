<?php
$category = get_queried_object();
$query_params = [
  'post_type' => 'post',
  'orderby' => [
    'is_sticky' => 'DESC',
    'date' => 'DESC',
  ],
  'paged' => get_query_var('paged') ?: 1,
  'cat' => $category->term_id
];
$articles = new WP_Query($query_params);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <div class="flex-grow">
      <div class="container">
        <div class="breadcrumbs">
          <a href="/">Главная</a>
          <i></i>
          <span><?php single_term_title(); ?></span>
        </div>

        <h1 class="page-title">
          <?php single_term_title(); ?>
        </h1>

        <div
          class="pb-32 max-md:pb-20"
          data-category-list
          data-category-list-max-page="<?php echo $articles->max_num_pages; ?>"
          data-category-list-current-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>"
          data-category-list-id="<?php echo $category->term_id; ?>"
        >
          <div class="grid grid-cols-3 gap-5 max-lg:gap-4 max-lg:grid-cols-2 max-md:grid-cols-1" data-category-list-wrap>
            <?php
            while ($articles->have_posts()) { 
              $articles->the_post();
              get_template_part('partials/actions-item');
            }
            wp_reset_postdata();
            ?>
          </div>

          <?php if ($articles->max_num_pages > 1) : ?>
          <button type="button" class="flex mx-auto mt-24 max-md:mt-16 primary-button font-bold text-lg w-56" data-category-list-load>Показать ещё</button>
          <?php endif; ?>
        </div>

        <div class="page-content">
          <?php echo term_description() ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
