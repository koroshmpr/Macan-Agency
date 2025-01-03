<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    $focus_keyword = get_post_meta(get_the_ID(), 'rank_math_focus_keyword', true) ?? '';
    $globalKeyword = get_field('keywords', 'option') ?? '';
    ?>
    <meta name="keywords" content="<?= $focus_keyword ?? $globalKeyword;?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= get_field('scripts', 'option') ?? ''; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="justify-content-between d-flex">
    <?php
    if (is_singular('post') || is_home()) {
        get_template_part('template-parts/layout/header/blog');
    } else {
        if (!is_page_template('landing.php')) {
            get_template_part('template-parts/layout/header/index');
        }
    }
    ?>
</header>
<main
    <?php
    if (is_post_type_archive('portfolio') || is_tax('portfolio_categories')) { ?>
        style="background-color: <?= get_field('portfolio_page_background', 'option'); ?>"
    <?php }
    if (is_singular('portfolio')) { ?>
        style="background-color: <?= get_field('background_color', get_the_ID()); ?>;position: relative"
    <?php }
    if (is_singular('post')) { ?>
        style="background-color: <?= get_field('blog_single_background', 'option'); ?>;position: relative"
    <?php }
    if (is_singular('services')) { ?>
        style="background-color: <?= get_field('services_color_background', get_the_ID()); ?>"
    <?php }
    if (is_page_template('contact.php')) { ?>
        style="background-color: <?= get_field('contact_single_background', 'option'); ?>"
    <?php }
    if (is_page_template('work.php')) { ?>
        style="background-color: <?= get_field('work_single_background', 'option'); ?>"
    <?php }
    if (is_home() || is_category()) { ?>
        style="background-color: <?= get_field('blog_archive_background', 'option'); ?>"
    <?php }
    if (is_search()) { ?>
        style="background-color: <?= get_field('search_single_background', 'option'); ?>"
    <?php }
    ?>
>