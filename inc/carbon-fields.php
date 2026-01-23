<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('after_setup_theme', function () {
  \Carbon_Fields\Carbon_Fields::boot();
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

  // Block::make('usage', 'Блок "Внесение"')
  //   ->add_fields([
  //     Field::make('separator', 'separator', 'Блок "Внесение"'),
  //     Field::make('complex', 'options', 'Опции')->add_fields([
  //       Field::make('image', 'photo', 'Фото')->set_help_text('Изображение размером 300х200'),
  //       Field::make('textarea', 'name', 'Название')->set_rows(2),
  //       Field::make('textarea', 'content', 'Значение')->set_rows(2),
  //     ]),
  //     Field::make('complex', 'specifications', 'Характеристики')->add_fields([
  //       Field::make('image', 'photo', 'Фото')->set_help_text('Изображение размером 128х64'),
  //       Field::make('textarea', 'name', 'Название')->set_rows(2),
  //       Field::make('textarea', 'content', 'Значение')->set_rows(2),
  //     ]),
  //   ])
  //   ->set_category('layout')
  //   ->set_mode('edit')
  //   ->set_icon('shortcode')
  //   ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
  //     get_template_part('blocks/usage', null, [
  //       'fields' => $fields,
  //     ]);
  //   });
}
