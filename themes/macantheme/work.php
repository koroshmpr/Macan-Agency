<?php /* Template Name: Work */
get_header();

$image = get_field('img_bck');
?>

    <section class="min-vh-100 w-100 pt-5 position-relative overflow-x-hidden overflow-y-hidden row align-items-center justify-content-center "
             style='background-size: contain!important; ;background: url("<?php echo esc_url($image['url']); ?>") no-repeat top left;'>
        <h1 class="py-5 text-center mt-3 text-white fw-bold"><?= get_the_title();?></h1>
        <div class="bg-dark bg-opacity-10 py-3 z-top mt-3 d-flex justify-content-center align-items-center flex-column custom-container">
            <ul class="nav px-lg-5" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="button button-white active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                        فرم استخدام
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="button button-white" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                        ارسال رزومه
                    </button>
                </li>
            </ul>
            <div class="tab-content min-vh-75 my-2 container" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <?php echo do_shortcode('[formidable id=3]'); ?>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <?php echo do_shortcode('[formidable id=11]'); ?>
                </div>
            </div>
        </div>

    </section>

    <style>
        .ui-datepicker .ui-datepicker-next span, .ui-datepicker .ui-datepicker-prev span {
            display: block!important;
        }
        .ui-datepicker .ui-datepicker-prev:before, .ui-datepicker .ui-datepicker-next:before {
            content: none!important;
        }
        input[type="text"].hasDatepicker {
            background-position: 3% center!important;
        }
    </style>
<?php get_footer();

