<div class="position-custom <?= is_singular('post') ? 'position-fixed left-0 right-0 bg-danger' : '' ;?> position-absolute z-top w-100 text-center py-3">
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
                    <svg width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                    </svg>
                </a>
            </div>
        </div>
    </nav>

</div>

<button class="bg-transparent border-0 btn top-0 text-white end-0 pt-3 pe-3 <?= is_singular('post') ? 'position-fixed' : 'position-absolute'; ?>"
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