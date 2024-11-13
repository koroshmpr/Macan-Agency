<?php
global $lan;
?>

<div class="bg-danger w-100 position-fixed lazy blog-menu z-top d-none d-lg-block">
    <div class="custom-container">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'headerMenuLocation',
                'menu_class' => 'navbar-nav pe-0 list-unstyled text-center fs-6 flex-row gap-5 align-items-stretch ' . ( $lan == 'en' ? 'header-en' : ''),
                'container' => false,
                'menu_id' => 'navbarMenu',
                'item_class' => 'nav-item',
                'link_class' => 'nav-link  hover-text '. ($lan == 'en' ? ' text-lg-end ' : 'text-lg-start'),
                'depth' => 2,
            ));
            ?>
            <button class="bg-transparent text-white border-0 btn <?= $lan == 'en' ? 'pe-5 ms-auto' : 'ps-5 me-auto'; ?>"
                    type="button"
                    data-bs-toggle="modal"
                    aria-label="Open Search Modal"
                    data-bs-target="#searchModal"
                    aria-controls="searchModal"
                    tabindex="0"
                    style="z-index: 1000">
                <svg width="30" height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
            </button>

            <div class=" z-top text-center py-2 d-flex gap-2 ">
                <a class="navbar-brand" href="<?php echo esc_url(get_home_url()) ?>">
                    <?php
                    $logo = get_field('site_logo', 'option');
                    ?>
                    <img class="lazy" width="170" height="45" src="<?= $logo['url'] ?>" alt="<?= get_bloginfo('name'); ?>">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="d-block d-lg-none">
    <?php get_template_part('template-parts/layout/header/index'); ?>
</div>
