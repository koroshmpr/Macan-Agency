<?php
global $lan;
$menuClass = 'navbar-nav gap-2 pe-0 text-white list-unstyled text-center text-lg-start fs-6 fw-light';
$HeaderClass = 'border-start border-white ps-2 border-3 fw-semibold mb-4 fs-5 text-white';
$lan = apply_filters('wpml_current_language', NULL);
?>
<footer class="bg-danger pt-4 pt-lg-0">
    <div class="custom-container">
        <div class="row gy-5 w- gy-lg-0 text-center <?= $lan == 'en' ? ' text-lg-end' : 'text-lg-start'; ?> py-lg-5 pb-3">
            <nav class="col-lg-3 col-6">
                <p class="<?= $HeaderClass; ?>"><?= $lan == 'en' ? 'Services' : 'خدمات'; ?></p>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footerLocationOne',
                    'menu_class' => $menuClass . ($lan == 'en' ? ' text-lg-end' : 'text-lg-start'),
                    'container' => false,
                    'item_class' => 'nav-item',
                    'link_class' => '',
                    'depth' => 2,
                ));
                ?>
            </nav>
            <div class="col-6 d-lg-flex d-grid justify-content-lg-between">
                <nav class="col-lg-6 col-12">
                    <p class="<?= $HeaderClass; ?>"><?= $lan == 'en' ? 'Blog' : 'بلاگ'; ?></p>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footerLocationTwo',
                        'menu_class' => $menuClass . ($lan == 'en' ? ' text-lg-end' : 'text-lg-start'),
                        'container' => false,
                        'item_class' => 'nav-item',
                        'link_class' => '',
                        'depth' => 2,
                    ));
                    ?>
                </nav>
                <nav class="col-12 col-lg-6 pt-5 pt-lg-0">
                    <p class="<?= $HeaderClass; ?>"><?= $lan == 'en' ? 'Portfolio' : 'نمونه کار'; ?></p>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footerLocationThree',
                        'menu_class' => $menuClass . ($lan == 'en' ? ' text-lg-end' : 'text-lg-start'),
                        'container' => false,
                        'item_class' => 'nav-item',
                        'link_class' => '',
                        'depth' => 2,
                    ));
                    ?>
                </nav>
            </div>
            <div class="col-lg-3 d-flex flex-column align-items-lg-start align-items-center gap-3">
                <p class="<?= $HeaderClass; ?>"><?= $lan == 'en' ? 'Address' : 'آدرس'; ?></p>
                <address class="d-flex flex-column gap-3">
                    <?php if (have_rows('address', 'option')): ?>
                        <?php while (have_rows('address', 'option')): the_row();
                            $addressText = get_sub_field('text');
                            $addressURL = get_sub_field('url');
                            ?>
                            <a class="lh-lg" href="<?= esc_url($addressURL) ?>">
                                <?= $addressText; ?>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </address>
                <?php
                $phone = get_field('phone_number', 'option'); ?>
                <a class="text-center text-lg-start" href="tel:<?= $phone; ?>">
                    <?= $phone; ?>
                </a>
                <ul class="list-unstyled d-flex mb-0 social_icons gap-2">
                    <?php
                    $socials = get_field('social_list', 'option');
                    if ($socials):
                        $first = 'true'; // Variable to track the first <li> element
                        foreach ($socials as $social):
                            ?>
                            <li class="<?= $first == 'false' ? 'p-1' : ''; ?>">
                                <a aria-label="link to <?= $social['social_title']; ?>"
                                   href="<?= esc_url($social['link']); ?>">
                                    <span class="<?= $social['icon_class']; ?> lh-base"></span>
                                </a>
                            </li>
                            <?php
                            $first = 'false';
                        endforeach;
                    endif; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>