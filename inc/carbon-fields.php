<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('after_setup_theme', function () {
  \Carbon_Fields\Carbon_Fields::boot();
});

add_action('admin_head', function () {
  echo '<style>
    [data-type^="carbon-fields/"] {
      padding: 16px;
      background: #f0f0f0;
      border: 2px solid #007cba;
    }

    [data-type^="carbon-fields/"] .cf-complex__tabs--tabbed-horizontal .cf-complex__tabs-list {
      padding-left: 0;
    }

    [data-type^="carbon-fields/"] .cf-field.cf-media-gallery .cf-field__body {
      background: #ffffff;
    }

    [data-type^="carbon-fields/"] .cf-field.cf-separator .cf-field__body h3 {
      font-size: 20px;
      color: #000;
      font-weight: 500;
    }
  </style>';
});

add_action('carbon_fields_register_fields', 'register_carbon_fields_blocks');
function register_carbon_fields_blocks()
{
  Container::make('post_meta', 'SEO')
    ->where('post_type', '=', 'page')
    ->or_where('post_type', '=', 'post')
    ->add_fields([
      Field::make('text', 'crb_seo_title', 'Заголовок'),
      Field::make('text', 'crb_seo_keywords', 'Ключевые слова'),
      Field::make('textarea', 'crb_seo_description', 'Описание'),
    ]);

  Container::make('theme_options', 'Параметры')
    ->add_tab('Общее', [
      Field::make('text', 'crb_theme_phone_number', 'Телефон / Номер'),
      Field::make('text', 'crb_theme_phone_time', 'Телефон / Время работы'),
      Field::make('text', 'crb_theme_email', 'E-mail'),
      Field::make('textarea', 'crb_theme_address', 'Адерс')->set_rows(2),
      Field::make('complex', 'crb_theme_messengers', 'Мессенджеры')->add_fields([
        Field::make('text', 'link', 'Ссылка'),
        Field::make('textarea', 'icon', 'Код иконки')->set_rows(2),
      ]),
    ])
    ->add_tab('Подвал', [
      Field::make('textarea', 'crb_footer_no_oferta', 'Не оферта')->set_rows(2),
      Field::make('textarea', 'crb_footer_counters', 'Счетчики')->set_rows(2),
      Field::make('textarea', 'crb_footer_copyright', 'Копирайт')->set_rows(2),
      Field::make('complex', 'crb_footer_groups', 'Соцсети')->add_fields([
        Field::make('text', 'link', 'Ссылка'),
        Field::make('textarea', 'icon', 'Код иконки')->set_rows(2),
      ]),
    ]);

  Container::make('post_meta', 'Главная')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/home.php')
    ->add_tab('Начальный экран', [
      Field::make('textarea', 'intro_title', 'Заголовок')->set_rows(2),
      Field::make('textarea', 'intro_desc', 'Описание')->set_rows(2),
      Field::make('text', 'intro_link', 'Ссылка'),
    ])
    ->add_tab('Услуги', [
      Field::make('complex', 'services', 'Услуги')->add_fields([
        Field::make('image', 'photo', 'Фото'),
        Field::make('text', 'shift', 'Сдвинуть фото'),
        Field::make('text', 'short_name', 'Короткое название'),
        Field::make('textarea', 'full_name', 'Полное название')->set_rows(2),
        Field::make('textarea', 'content', 'Описание')->set_rows(4),
        Field::make('text', 'link', 'Ссылка'),
      ]),
    ]);

  Container::make('post_meta', 'Контакты')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/contacts.php')
    ->add_fields([
      Field::make('complex', 'cards', 'Карточки')->add_fields([
        Field::make('image', 'icon', 'Иконка'),
        Field::make('text', 'name', 'Название'),
        Field::make('rich_text', 'content', 'Содержимое'),
      ]),
      Field::make('textarea', 'map_code', 'Код карты')->set_rows(4),
    ]);

  Container::make('post_meta', 'Отзыв')
    ->where('post_type', '=', 'review')
    ->add_fields([
      Field::make('textarea', 'introtext', 'Краткое описание')->set_rows(2),
      Field::make('checkbox', 'at_home', 'На главную'),
    ]);

  Block::make('partials_services', 'Блок "Выбирайте отдых для себя"')
    ->add_fields([
      Field::make('separator', 'separator', 'Блок "Выбирайте отдых для себя"'),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/services', null, [
        'fields' => $fields,
        'attributes' => $attributes,
        'inner_blocks' => $inner_blocks,
      ]);
    });

  Block::make('partials_news', 'Блок "Новости"')
    ->add_fields([
      Field::make('separator', 'separator', 'Блок "Новости"'),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/news', null, [
        'fields' => $fields,
        'attributes' => $attributes,
        'inner_blocks' => $inner_blocks,
      ]);
    });

  Block::make('partials_reviews', 'Блок "Люди говорят о нас"')
    ->add_fields([
      Field::make('separator', 'separator', 'Блок "Люди говорят о нас"'),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/reviews', null, [
        'fields' => $fields,
        'attributes' => $attributes,
        'inner_blocks' => $inner_blocks,
      ]);
    });

  Block::make('partials_offer', 'Блок "Предложение"')
    ->add_fields([
      Field::make('separator', 'separator', 'Блок "Предложение"'),
      Field::make('media_gallery', 'gallery', 'Фотогалерея'),
      Field::make('complex', 'items', 'Элементы')
        ->set_layout('tabbed-horizontal')->add_fields([
          Field::make('textarea', 'title', 'Название')->set_rows(2),
          Field::make('rich_text', 'content', 'Описание'),
          Field::make('text', 'price', 'Цена')->set_width(50),
          Field::make('text', 'unit', 'Ед. измерения')->set_width(50),
          Field::make('text', 'button_text', 'Текст кнопки')->set_width(50),
          Field::make('text', 'button_link', 'Ссылка кнопки')->set_width(50),
        ])
        ->set_header_template('
            <% if (title) { %>
                <%- title %> <%- price ? "(" + price + ")" : "" %>
            <% } %>
        '),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/offer', null, [
        'fields' => $fields,
        'attributes' => $attributes,
        'inner_blocks' => $inner_blocks,
      ]);
    });

  Block::make('partials_slidwshow', 'Блок "Слайдшоу"')
    ->add_fields([
      Field::make('separator', 'separator', 'Блок "Слайдшоу"'),
      Field::make('text', 'aspect_ratio', 'Соотношение сторон'),
      Field::make('media_gallery', 'gallery', 'Фотогалерея'),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/slidwshow', null, [
        'fields' => $fields,
        'attributes' => $attributes,
        'inner_blocks' => $inner_blocks,
      ]);
    });
}
