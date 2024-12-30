                    <?php
                    get_template_part('template-parts/layout/backToTop');

                    global $lan;
                    $lan = apply_filters('wpml_current_language', NULL);
                    $preloader = get_field('preloader', 'option');
                    if ($preloader):
                        if (!is_singular('portfolio') && is_front_page()) {
                            get_template_part('template-parts/preload/' . $lan);
                        }
                    endif;
                    ?>
            </main>
            <?php
            if (!is_page_template() == 'landing'): ?>
                <?php if (is_singular('portfolio')): ?>
                    <div class="modal fade" id="portfolioModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog my-0 modal-dialog-centered w-100 mw-100">
                            <div class="modal-header px-0 py-2 position-absolute top-0 start-0 end-0 w-100 d-flex justify-content-start align-items-center z-top">
                                <button type="button" class="text-white btn fs-4 modal-close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                    <svg width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                    </svg>
                                </button>
                                <div class="pagination-button text-white"></div>
                            </div>
                            <div class="modal-body px-0">
                                <div class="swiper swiperModal">
                                    <div class="swiper-wrapper align-items-center">
                                        <?php $i = 0;
                                        while (have_rows('gallery')): the_row(); ?>
                                            <div class="swiper-slide" id="modalPlayerVideo">
                                                <div class="row w-100 px-0 justify-content-center align-items-center">
                                                    <div class="col-lg-6">
                                                        <?php
                                                        $media_type = get_sub_field('media_type');
                                                        $image = get_sub_field('image');
                                                        $video = get_sub_field('video');
                                                        $cover = get_sub_field('cover');
                                                        if ($media_type == 'Image') { ?>
                                                            <div class="ratio-16x9 ratio " data-type="image">
                                                                <img class="img-fluid object-fit-contain" src="<?= $image['url'] ?>"
                                                                     alt="<?= $image['alt'] ?>">
                                                            </div>
                                                        <?php } elseif ($media_type == 'Video') { ?>
                                                            <div class="ratio-16x9 ratio" data-type="video">
                                                                <video poster="<?= $cover['url'] ?>" class="w-100" controls=""
                                                                       src="<?= $video['url'] ?>">
                                                                    <source src="" type="video/mp4">
                                                                </video>
                                                            </div>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile;
                                        wp_reset_postdata(); ?>


                                    </div>
                                </div>
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button next-button position-absolute end-0 top-50 text-white fs-4 z-top px-4">
                                    <svg width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                                    </svg>
                                </div>
                                <div class="swiper-button prev-button position-absolute top-50 text-white fs-4 z-top ps-4">
                                    <svg width="25" height="25" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                    </svg>
                                </div>

                            </div>
                        </div>
                        <div class="accordion position-absolute bottom-0 start-0 end-0" id="accordionThumb">
                            <button class="btn rounded-0" style="background-color: #0D0A0A;" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <svg width="25" height="25" fill="currentColor" class="bi bi-grid-3x3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5zM1.5 1a.5.5 0 0 0-.5.5V5h4V1zM5 6H1v4h4zm1 4h4V6H6zm-1 1H1v3.5a.5.5 0 0 0 .5.5H5zm1 0v4h4v-4zm5 0v4h3.5a.5.5 0 0 0 .5-.5V11zm0-1h4V6h-4zm0-5h4V1.5a.5.5 0 0 0-.5-.5H11zm-1 0V1H6v4z"/>
                                </svg>
                            </button>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionThumb"
                                 style="background-color: #0D0A0A;">
                                <div class="swiper swiperThumb pt-3">
                                    <ul class="swiper-wrapper list-unstyled justify-content-start justify-content-lg-center align-items-center">
                                        <?php $i = 0;
                                        while (have_rows('gallery')): the_row(); ?>
                                            <?php
                                            $media_type = get_sub_field('media_type');
                                            $image = get_sub_field('image');
                                            $video = get_sub_field('video');
                                            $cover = get_sub_field('cover');
                                            if ($media_type == 'Image') { ?>
                                                <li class="swiper-slide">
                                                    <div class="ratio-1x1 ratio">
                                                        <img class="object-fit" src="<?= $image['url'] ?>"
                                                             alt="<?= $image['alt'] ?>">
                                                    </div>
                                                </li>
                                            <?php } elseif ($media_type == 'Video') { ?>
                                                <li class="swiper-slide">
                                                    <div class="ratio-1x1 ratio">
                                                        <img class="object-fit" src="<?= $cover['url'] ?>"
                                                             alt="<?= $cover['alt'] ?>">
                                                    </div>
                                                </li>
                                            <?php }
                                            ?>
                                        <?php endwhile;
                                        wp_reset_postdata(); ?>


                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
                <div class="modal modal-xl" style="backdrop-filter: blur(5px);" aria-hidden="true" tabindex="-1" id="searchModal"
                     aria-labelledby="modalSearchLabel">
                    <div class="modal-dialog">
                        <div class="modal-content bg-transparent border-0">
                            <div class="modal-header">
                                <button type="button" class="search-close bg-transparent border-0 text-white fs-3"
                                        data-bs-dismiss="modal"
                                        aria-label="Close">
                                    <svg width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php get_template_part('template-parts/layout/header/search'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;
            if (is_singular('post') || is_home()) {
                get_template_part('template-parts/layout/footer/blog');
            }
            wp_footer(); ?>
    </body>
</html>