<div class="position-custom position-absolute z-top w-100 text-center py-3">
    <a class="navbar-brand z-top"
       data-aos="zoom-in-down"
       data-aos-delay="150"
       data-aos-disable
       href="<?php echo esc_url(get_home_url()) ?>">
        <?php
        $logo = get_field('site_logo', 'option');
        ?>
        <img class="lazy"
             height="45"
             width="170"
             src="<?= $logo['url'] ?>"
             alt="<?= get_bloginfo('name'); ?>">
    </a>
</div>

<div class="menu-toggle position-fixed d-block" data-bs-toggle="modal" data-bs-target="#headerModal">
    <a class="d-none" href="#">menu</a>
    <div class="lines-button x d-inline-flex align-items-center justify-content-center lazy text-center p-0 m-0">
        <span class="lines bg-white d-inline-block p-0 m-0 position-relative"></span>
    </div>
</div>

<!-- Modal -->
<div class="modal fade overflow-y-hidden" id="headerModal" tabindex="-1" aria-labelledby="headerModalLabel"
     aria-hidden="true">
    <div class="menu-toggle-close position-absolute d-block z-top" data-bs-dismiss="modal" aria-label="Close">
        <div class="lines-button-close x d-inline-flex align-items-center justify-content-center lazy text-center p-0 m-0">
            <span class="lines-close d-inline-block p-0 m-0 position-relative"></span>
        </div>
    </div>

    <nav class="modal-dialog h-100 bg-transparent modal-xl menu d-flex justify-content-center flex-column align-items-center">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'headerMenuLocation',
            'menu_class' => 'navbar-nav pe-0 text-white list-unstyled text-center fs-4 w-100 position-relative lh-sm',
            'container' => false,
            'menu_id' => 'navbarTogglerMenu',
            'item_class' => 'nav-item',
            'link_class' => 'nav-link hover-text lazy',
            'depth' => 2,
        ));
        ?>
        <div class="social_icons position-absolute bottom-0 pb-5 mb-3 d-flex flex-column justify-content-center align-items-center gap-3">
            <div>
                <ul class="list-unstyled d-flex align-items-center justify-content-center mb-0">
                    <?php
                    if (have_rows('social_list', 'option')):
                        $first = true; // Variable to track the first <li> element
                        while (have_rows('social_list', 'option')) : the_row();
                            $icon_class = get_sub_field('icon_class');
                            $title = get_sub_field('social_title');
                            $url = get_sub_field('link'); ?>
                            <li class="<?php if (!$first) echo 'p-1'; ?>">
                                <a  title="<?= $title; ?>" href="<?= esc_url($url); ?>">
                                    <span class="<?= $icon_class; ?>"></span>
                                </a >
                            </li>
                            <?php
                            $first = false;
                        endwhile;
                    endif; ?>
                </ul>
            </div>
            <div>
                <a class="pt-1 d-inline-flex align-items-baseline flex-row-reverse gap-2 lazy" href="tel:<?= get_field('phone_number', 'option'); ?>">
                    <?= get_field('phone_number', 'option'); ?>
                    <i class="bi bi-telephone-fill"></i></a>
            </div>
        </div>
    </nav>

</div>

<button class="bg-transparent border-0 btn top-0 end-0 pt-3 pe-3 <?= is_singular('post') ? 'position-fixed' : 'position-absolute'; ?>"
        type="button"
        data-bs-toggle="modal"
        aria-label="Open Search Modal"
        data-bs-target="#searchModal"
        aria-controls="searchModal"
        tabindex="0"
        style="z-index: 1000">
    <i class="bi bi-search text-white fs-4"></i>
</button>

