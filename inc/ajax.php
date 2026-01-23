<?php

add_action('wp_enqueue_scripts', 'ajax_data', 99);

function ajax_data()
{
  wp_localize_script('scripts', 'theme_ajax', [
    'url' => admin_url('admin-ajax.php'),
  ]);
}

function portfolio_list_load_callback()
{
    $posts_query = new WP_Query([
      'post_type' => 'portfolio',
      'tag' => $_POST['tag'] ?: null,
      'paged' => $_POST['page'] ?: 1
    ]);

    while ($posts_query->have_posts()) { 
      $posts_query->the_post();
      get_template_part('partials/portfolio-item');
    }
    
    wp_reset_postdata();

    die();
}
 
add_action('wp_ajax_portfolio_list_load', 'portfolio_list_load_callback');
add_action('wp_ajax_nopriv_portfolio_list_load', 'portfolio_list_load_callback');

function category_list_load_callback()
{
    $posts_query = new WP_Query([
      'post_type' => 'post',
      'orderby' => [
        'is_sticky' => 'DESC',
        'date' => 'DESC',
      ],
      'paged' => $_POST['page'] ?: 1,
      'cat' => $_POST['category'] ?: null
    ]);

    while ($posts_query->have_posts()) { 
      $posts_query->the_post();
      get_template_part('partials/actions-item');
    }
    
    wp_reset_postdata();

    die();
}
 
add_action('wp_ajax_category_list_load', 'category_list_load_callback');
add_action('wp_ajax_nopriv_category_list_load', 'category_list_load_callback');

/**
 * feedback_form
 */
add_action('wp_ajax_feedback_form', 'feedback_form_callback');
add_action('wp_ajax_nopriv_feedback_form', 'feedback_form_callback');
function feedback_form_callback()
{
  $errors = [];
  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }
  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = 'Укажите Ваш телефон.';
  }
  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $email_to = get_option('admin_email');
    $rows = [];
    $rows[] = 'Телефон: ' . sanitize_text_field($_POST['phone']);
    $rows[] = 'Страница: ' . sanitize_text_field($_POST['page']);
    $body = implode("\n", $rows);
    $subject = $_POST['subject'];
    wp_mail($email_to, $subject, $body);
    wp_send_json_success();
  }
  wp_die();
}

/**
 * hero_form
 */
add_action('wp_ajax_hero_form', 'hero_form_callback');
add_action('wp_ajax_nopriv_hero_form', 'hero_form_callback');
function hero_form_callback()
{
  $errors = [];
  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }
  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = 'Укажите Ваш телефон.';
  }
  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $email_to = get_option('admin_email');
    $rows = [];
    $rows[] = 'Телефон: ' . sanitize_text_field($_POST['phone']);
    $rows[] = 'Тип: ' . sanitize_text_field($_POST['type']);
    $rows[] = 'Площадь: ' . sanitize_text_field($_POST['area']);
    $rows[] = 'Страница: ' . sanitize_text_field($_POST['page']);
    $body = implode("\n", $rows);
    $subject = $_POST['subject'];
    wp_mail($email_to, $subject, $body);
    wp_send_json_success();
  }
  wp_die();
}

/**
 * partnership_form
 */
add_action('wp_ajax_partnership_form', 'partnership_form_callback');
add_action('wp_ajax_nopriv_partnership_form', 'partnership_form_callback');
function partnership_form_callback()
{
  $errors = [];
  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }
  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = 'Укажите Ваш телефон.';
  }
  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $email_to = get_option('admin_email');
    $rows = [];
    $rows[] = 'Имя: ' . sanitize_text_field($_POST['your-name']);
    $rows[] = 'Телефон: ' . sanitize_text_field($_POST['phone']);
    $rows[] = 'E-mail: ' . sanitize_text_field($_POST['email']);
    $rows[] = 'Город: ' . sanitize_text_field($_POST['city']);
    $rows[] = 'Название компании: ' . sanitize_text_field($_POST['company-name']);
    $rows[] = 'Сайт компании: ' . sanitize_text_field($_POST['company-site']);
    $rows[] = 'Специализация: ' . sanitize_text_field($_POST['message']);
    $rows[] = 'Страница: ' . sanitize_text_field($_POST['page']);
    $body = implode("\n", $rows);
    $subject = $_POST['subject'];
    wp_mail($email_to, $subject, $body);
    wp_send_json_success();
  }
  wp_die();
}

/**
 * faq_form
 */
add_action('wp_ajax_faq_form', 'faq_form_callback');
add_action('wp_ajax_nopriv_faq_form', 'faq_form_callback');
function faq_form_callback()
{
  $errors = [];
  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }
  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = 'Укажите Ваш телефон.';
  }
  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $email_to = get_option('admin_email');
    $rows = [];
    $rows[] = 'Имя: ' . sanitize_text_field($_POST['your-name']);
    $rows[] = 'Телефон: ' . sanitize_text_field($_POST['phone']);
    $rows[] = 'Вопрос: ' . sanitize_text_field($_POST['message']);
    $rows[] = 'Страница: ' . sanitize_text_field($_POST['page']);
    $body = implode("\n", $rows);
    $subject = $_POST['subject'];
    wp_mail($email_to, $subject, $body);
    wp_send_json_success();
  }
  wp_die();
}

/**
 * quiz_form
 */
add_action('wp_ajax_quiz_form', 'quiz_form_callback');
add_action('wp_ajax_nopriv_quiz_form', 'quiz_form_callback');
function quiz_form_callback()
{
  $errors = [];
  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }
  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = 'Укажите Ваш телефон.';
  }
  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $email_to = get_option('admin_email');
    $rows = [];
    $rows[] = 'Телефон: ' . sanitize_text_field($_POST['phone']);
    foreach ($_POST as $key => $value) {
      if (str_starts_with($key, 'question:')) {
        $rows[] = str_replace("question:", "", $key) . ': ' . sanitize_text_field($value);
      }
    }
    $rows[] = 'Страница: ' . sanitize_text_field($_POST['page']);
    $body = implode("\n", $rows);
    $subject = $_POST['subject'];
    wp_mail($email_to, $subject, $body);
    wp_send_json_success();
  }
  wp_die();
}

/**
 * calc_form
 */
add_action('wp_ajax_calc_form', 'calc_form_callback');
add_action('wp_ajax_nopriv_calc_form', 'calc_form_callback');
function calc_form_callback()
{
  $errors = [];
  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }
  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }
  if (empty($_POST['phone'])) {
    $errors['phone'] = 'Укажите Ваш телефон.';
  }
  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $files = $_FILES['attachments'];
    $attachments = [];
    foreach ($files['name'] as $key => $name) {
      if ($files['error'][$key] === UPLOAD_ERR_OK) {
        $tmp_name = $files['tmp_name'][$key];
        if (is_uploaded_file($tmp_name)) {
          $attachments[] = $tmp_name;
        }
      }
    }
    $email_to = get_option('admin_email');
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    $rows = [];
    $rows[] = 'Телефон: ' . sanitize_text_field($_POST['phone']);
    $rows[] = 'Площадь: ' . sanitize_text_field($_POST['area']);
    foreach ($_POST as $key => $value) {
      if (str_starts_with($key, 'question:')) {
        $rows[] = str_replace("question:", "", $key) . ': ' . sanitize_text_field($value);
      }
    }
    $rows[] = 'Страница: ' . sanitize_text_field($_POST['page']);
    $body = implode("\n", $rows);
    $subject = $_POST['subject'];
    wp_mail($email_to, $subject, $body, $headers, $attachments);
    wp_send_json_success();
  }
  wp_die();
}

/**
 * review_form
 */
add_action('wp_ajax_review_form', 'review_form_callback');
add_action('wp_ajax_nopriv_review_form', 'review_form_callback');
function review_form_callback()
{
  $errors = [];
  if (!wp_verify_nonce($_POST['nonce'], 'feedback-nonce')) {
    wp_die('Данные отправлены с неподдерживаемого адреса');
  }
  if (!empty($_POST['submitted'])) {
    $errors['submitted'] = 'Что?';
  }
  if (empty($_POST['message'])) {
    $errors['message'] = 'Укажите Ваш комментарий.';
  }
  if ($errors) {
    wp_send_json_error($errors);
  } else {
    $post_id = wp_insert_post([
      'post_title' => sanitize_text_field($_POST['your-name']),
      'post_status' => 'draft',
      'post_type' => 'user-review',
      'post_author' => 1,
    ]);
    carbon_set_post_meta($post_id, 'rating', $_POST['rating']);
    carbon_set_post_meta($post_id, 'author', $_POST['your-name']);
    carbon_set_post_meta($post_id, 'content', $_POST['message']);
    carbon_set_post_meta($post_id, 'date', date('Y-m-d', time()));

    $files = $_FILES['gallery'];
    if ($files) {
      $files_flat = [];
      $count = count($files['name']);
      for ($i = 0; $i < $count; $i++) {
        $files_flat[] = [
          'name'      => $files['name'][$i],
          'full_path' => $files['full_path'][$i],
          'type'      => $files['type'][$i],
          'tmp_name'  => $files['tmp_name'][$i],
          'error'     => $files['error'][$i],
          'size'      => $files['size'][$i]
        ];
      }
      $gallery = [];
      $attachments = [];
      foreach ($files_flat as $file) {
        if ($file['error'] === UPLOAD_ERR_OK) {
          if (is_uploaded_file($file['tmp_name'])) {
            $attachments[] = $file['tmp_name'];
            $gallery[] = create_attachment_from_upload($file, $post_id);
          }
        }
      }
      carbon_set_post_meta($post_id, 'gallery', $gallery);
    }

    $admin_url = get_site_url() . '/wp-admin/post.php?post=' . $post_id . '&action=edit';
    $email_to = get_option('admin_email');
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    $rows = [];
    $rows[] = 'Имя: ' . sanitize_text_field($_POST['your-name']);
    $rows[] = 'Оценка: ' . sanitize_text_field($_POST['rating']);
    $rows[] = 'Сообщение: ' . sanitize_text_field($_POST['message']);
    $rows[] = 'Страница: ' . sanitize_text_field($_POST['page']);
    $rows[] = 'Отзыв в админке: <a href="' . $admin_url . '">' . $admin_url . '</a>';
    $body = implode("\n", $rows);
    $subject = $_POST['subject'];
    wp_mail($email_to, $subject, $body, $headers, $attachments);
    wp_send_json_success();
  }
  wp_die();
}
