<?php /* Template Name: landing */
get_header();

$titleClass = 'fw-bolder fs-3 text-white mb-5 text-lg-start text-center';
?>
<?php
//hero
?>
    <section class="bg-danger">
        <div class="container py-lg-5 py-4 d-flex flex-wrap justify-content-center">
            <div class="col-lg-5 col-11 row row-gap-4 justify-content-lg-start justify-content-center align-content-center">
                <a class="navbar-brand z-top text-center text-lg-start"
                   data-aos="zoom-in-down"
                   data-aos-delay="120"
                   data-aos-disable
                   href="<?php echo esc_url(get_home_url()) ?>">
                    <?php
                    $logo = get_field('site_logo', 'option');
                    ?>
                    <img class="lazy h-auto"
                         height="45"
                         width="200"
                         src="<?= $logo['url'] ?>"
                         alt="<?= get_bloginfo('name'); ?>">
                </a>
                <h1 class="display-1 text-white text-center text-lg-start fw-bolder"><?= get_field('hero-title'); ?></h1>
                <?php
                $socials = get_field('socials');
                if ($socials):?>
                    <div class="d-flex gap-lg-2 px-0 align-items-center justify-content-center justify-content-lg-start">
                        <?php foreach ($socials as $social): ?>
                            <a class="p-2 rounded-circle social-links" aria-label="link for <?= $social['name']; ?>"
                               href="<?= $social['link']['url'] ?? ''; ?>">
                                <?= $social['svg']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <a class="text-white px-5 rounded text-center py-3 fs-4 mt-2 d-block col-lg-4 col overflow-hidden position-relative fw-bold landing-btn"
                   href="<?= get_field('hero-btn-link')['url'] ?? ''; ?>">
                    <?= get_field('hero-btn-title'); ?>
                    <span class="d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                    <svg width="30" height="30" fill="currentColor" class="bi bi-arrow-down-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 4a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5A.5.5 0 0 1 8 4"/>
                    </svg>
                </span>
                </a>
            </div>
            <div class="col-lg-7 col-11 overflow-hidden">
                <?php
                $iconBoxes = get_field('iconBoxes');
                if ($iconBoxes) :?>
                    <div class="row row-cols-lg-2 justify-content-center align-items-center">
                        <?php foreach ($iconBoxes as $index => $iconBox) : ?>
                            <div data-aos-delay="<?= $index; ?>0" data-aos="zoom-out"
                                 class="p-lg-5 p-3 text-white text-center">
                                <img width="100" src="<?= $iconBox['image']['url'] ?? ''; ?>"
                                     alt="<?= $iconBox['image']['title'] ?? ''; ?>">
                                <h3 class="fw-bold fs-4"><?= $iconBox['title']; ?></h3>
                                <p class="text-start lh-lg"><?= $iconBox['content']; ?></p>
                            </div>

                        <?php endforeach; ?>
                    </div>
                <?php endif;
                ?>
            </div>
        </div>
    </section>
<?php
//portfolios
?>
    <section class="bg-danger">
        <div class="container">
            <h2 class="<?= $titleClass; ?>"><?= get_field('portfolio-title'); ?></h2>
        </div>
        <?php
        $portfolios = get_field('portfolios');
        if ($portfolios): ?>
            <div class="swiper landing-portfolio">
                <div class="swiper-wrapper" style="transition-timing-function: linear !important;">
                    <?php
                    foreach ($portfolios as $portfolio):?>
                        <div class="swiper-slide">
                            <img class="img-fluid object-fit-cover" src="<?= $portfolio['url'] ?? ''; ?>"
                                 alt="<?= $portfolio['title'] ?? ''; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif;
        $portfolios2 = get_field('portfolios_row_2');
        if ($portfolios2): ?>
            <div dir="ltr" class="swiper landing-portfolio">
                <div class="swiper-wrapper" style="transition-timing-function: linear !important;">
                    <?php
                    foreach ($portfolios2 as $portfolio2):?>
                        <div class="swiper-slide">
                            <img class="img-fluid object-fit-cover" src="<?= $portfolio2['url'] ?? ''; ?>"
                                 alt="<?= $portfolio2['title'] ?? ''; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
<?php
//customers
?>
    <section class="bg-danger py-5">
        <div class="container">
            <h2 class="<?= $titleClass; ?>"><?= get_field('customers-title'); ?></h2>
            <?php
            $customers = get_field('customers');
            if ($customers): ?>
                <div class="swiper landing-customers">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($customers as $customer):?>
                            <div class="swiper-slide" title="<?php echo get_the_title($customer); ?>"
                                 data-aos="zoom-in">
                                <?php
                                $client_image = get_field('img_class', $customer);
                                $client_attr = get_field('client_attr', $customer);
                                if (!empty($client_attr)): ?>
                                    <img class="<?= $client_image; ?>" width="100" height="100"
                                         src="<?php echo $client_attr; ?>"
                                         alt="<?php echo get_the_title($customer); ?>"/>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="landing-pagination mt-5 text-center"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php
//lists
?>
    <section class="p-4 w-100 mx-auto row row-cols-lg-3 row-gap-3 justify-content-center overflow-hidden listItems">
        <?php
        $lists = get_field('lists');
        if ($lists): ?>
            <?php foreach ($lists as $index => $list): ?>
                <div class="p-lg-4">
                    <div
                        <?php
                        if (($index) == 0) {
                            echo 'data-aos="fade-right" data-aos-delay="150"';
                        } elseif (($index) == 1) {
                            echo 'data-aos="zoom-out"';
                        } elseif (($index) == 2) {
                            echo 'data-aos="fade-left" data-aos-delay="150"';
                        }; ?>
                            class="shadow p-5 d-flex flex-column align-items-center justify-content-center overflow-hidden">
                        <h4 class="text-danger col-auto pb-3 mb-5 border-bottom border-danger border-2"><?= $list['title']; ?></h4>
                        <?php
                        $listItems = $list['list-items'];
                        if ($listItems):?>
                            <ul class="col-auto text-danger fs-5">
                                <?php foreach ($listItems as $listItem): ?>
                                    <li><?= $listItem['item']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
<?php
//form
?>
    <section class="bg-danger py-5 form-landing">
        <div class="container">
            <h2 class="<?= $titleClass; ?>"><?= get_field('form-title'); ?></h2>
            <div class="col-lg-8 col-11 mx-auto" id="landingForm">
                <?= do_shortcode('[gravityform id="' . get_field('form-id') . '" title="false" description="false" ajax="true"]') ?>
            </div>
        </div>
    </section>
    <style>
        :root {
            --landing: #006E7D
        }

        .landing-btn {
            background-color: var(--landing);
        }

        .landing-btn span {
            background-color: var(--landing);
            top: -100%;
            left: 0;
            transition: 0.3s ease-out;
            right: 0
        }

        .landing-btn:active span, .landing-btn:hover span {
            top: 0;
            z-index: 1;
        }

        .form-landing .frm_forms.frm_style_formidable-style.with_frm_style {
            background-color: transparent !important;
        }

        .listItems li:before {
            color: var(--bs-danger);
        }

        .form-landing .frm_forms {
            background-color: transparent !important;
        }

        .form-landing input {
            background-color: transparent !important;
            border: 3px solid white !important;
            padding: 22px !important;
            color: white !important;
            font-weight: bold !important;
            text-align: center;
            font-size: 22px !important;
        }

        .validation_message.gfield_validation_message {
            background-color: transparent !important;
            text-align: center !important;
            color: white !important;
            font-weight: bold !important;
            font-size: 22px !important;
            border: none !important;
        }

        .form-landing input::-webkit-input-placeholder {
            color: white !important;
            text-align: center !important;
        }

        .form-landing .gform_footer {
            justify-content: center;
        }

        .form-landing .gform_button.button {
            background-color: var(--landing) !important;
            padding: 15px 40px !important;
            font-size: 22px !important;
            border: 0 !important;
            box-shadow: none !important;
        }

        .ginput_container_verfication {
            display: flex;
        }

        .frm_verify, .gform_validation_errors {
            display: none;
        }

        .name_first {
            padding: 0 !important;
        }

        .swiper-pagination-bullet.active {
            background-color: white !important;
        }

        .social-links {
            background-size: 210% !important;
            background: linear-gradient(to right, transparent 50%, var(--landing) 50%) left;
            transition: ease-out 0.3s;
        }

        .social-links:hover {
            background-position: right;
        }
    </style>
<?php get_footer();

