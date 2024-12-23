<?php get_header();
global $lan;
$lan = apply_filters('wpml_current_language', NULL);
while (have_posts()) :
    the_post();
    ?>
    <div class="position-fixed blog-progress lazy w-100 z-1">
        <progress class="w-100 lazy" max="100" value="0"></progress>
    </div>
    <section class="min-vh-100 bg-danger <?= $lan == 'en' ? 'lang-en' : ''; ?>" style="padding-top: 120px">
            <div class="custom-container d-flex flex-column justify-content-center align-items-start">
                <?php
                $category_detail = get_the_category($post->ID);//$post->ID
                foreach ($category_detail as $category) {
                    $category_url = get_category_link($category->term_id); ?>
                    <a href="<?= get_post_type_archive_link('post'); ?>" id="catNameSingle"
                       class="text-white text-decoration-none fs-6 text-shadow">
                        <?php echo $category->name; ?>
                    </a>
                    <script>
                        jQuery(document).ready(function () {
                            jQuery('#catNameSingle').on('click', function () {
                                localStorage.setItem('categoryID', '<?php echo $category->term_id; ?>');
                            });
                        });
                    </script>
                <?php } ?>
                <h1 class="fs-4 text-white lh-normal my-3 <?php echo $lan == 'en' ? '' : 'ff-yekan'; ?> ">
                    <?php the_title(); ?>
                </h1>
                <div class="d-inline-flex align-items-center gap-3 mb-3">
                    <div class="border-1 border-white border col-3 text-white d-flex align-items-center justify-content-center"
                         style="width: 60px;height: 60px">
                        <svg width="40" height="40" fill="currentColor" class="bi bi-person fs-3" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start gap-lg-3">
                        <span aria-label="Author name" class="fw-normal text-white fw-lighter">
                            <?php
                            $author_id = get_the_author_meta('ID');
                            $author_en = get_field('name_en', 'user_' . $author_id); ?>
                            <?= $lan == 'en' ? $author_en : get_the_author_meta('display_name', $post->post_author); ?>

                        </span>
                        <div class="d-inline-flex flex-wrap text-white gap-1 gap-lg-3 <?= $lan == 'fa' ? 'ff-yekan' : ''; ?>  align-items-center fw-lighter">
                            <?php
                            $current_language = apply_filters('wpml_current_language', null);

                            function get_formatted_date_custom($format, $timestamp = null)
                            {
                                global $current_language;
                                if ($current_language == 'fa') {
                                    // Shamsi date format for Persian
                                    return shamsi_date($format, $timestamp);
                                } else {
                                    // Gregorian date for English
                                    return date($format, $timestamp);
                                }
                            }

                            // Display the original post date
                            ?>
                            <div aria-label="created date" class="d-flex gap-2 align-items-start lh-normal mb-0" style="line-height:1.2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-clock-history" viewBox="0 0 16 16">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483m.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                <?php echo get_formatted_date_custom('d F Y', strtotime(get_the_date('Y-m-d'))); ?>
                            </div>

                            <?php
                            $post_id = get_the_ID();
                            $updated_date = get_formatted_date_custom('d F Y', strtotime(get_the_modified_date('Y-m-d')));

                            // Display revisions dropdown with translated dates
                            $revisions = wp_get_post_revisions($post_id);
                            if ($revisions) {
                                $unique_dates = [];

                                foreach ($revisions as $revision) {
                                    $revision_date = get_formatted_date_custom('d F Y', strtotime(get_the_modified_date('Y-m-d', $revision->ID)));
                                    if (!in_array($revision_date, $unique_dates)) {
                                        $unique_dates[] = $revision_date;
                                    }
                                }

                                $created_date = get_formatted_date_custom('d F Y', strtotime(get_the_date('Y-m-d', $post_id)));
                                $created_date_index = array_search($created_date, $unique_dates);
                                if ($created_date_index !== false) {
                                    unset($unique_dates[$created_date_index]);
                                }

                                sort($unique_dates);
                                array_unshift($unique_dates, $created_date);

                                echo '<div aria-label="updated date" class="dropdown d-flex align-items-start lh-normal  gap-1">';
                                echo '<button class="btn p-0 rounded-circle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-labelledby="reversion-list">';
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                    </svg>';
                                echo '</button>';
                                echo '<ul id="reversion-list" class="dropdown-menu dropdown-menu-dark">';
                                foreach ($unique_dates as $index => $date) {
                                    echo '<li class="dropdown-item">' . $date . '</li>';
                                    if ($index == 0) {
                                        echo '<li><hr class="dropdown-divider mt-0"></li>';
                                    }
                                }
                                echo '</ul>';
                                echo $updated_date;
                                echo '</div>';
                            } else {
                                echo 'No revisions found.';
                            }
                            ?>

                            <div class="d-none d-md-inline vr bg-white opacity-100"></div>
                            <div aria-label="reading time" class="text-semi-light d-flex gap-2 align-items-start lh-normal mb-0 fs-6 <?= $lan == 'en' ? '' : 'ff-yekan'; ?> ">
                                <svg width="20" height="20" fill="currentColor"
                                         class="bi bi-stopwatch" viewBox="0 0 16 16">
                                    <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5z"/>
                                    <path d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64l.012-.013.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5M8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3"/>
                                </svg>
                                <span><?= $lan == 'en' ? 'Reading Time : ' . reading_time() . ' mins' : 'مدت زمان مطالعه : ' . reading_time() . ' دقیقه'; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100" style="margin-bottom: -140px">
                    <?php
                    // Get the post ID
                    $post_id = get_the_ID();
                    // Get the featured image ID
                    $featured_image_id = get_post_thumbnail_id($post_id);
                    // Get the full-size image URL
                    $image_url = wp_get_attachment_image_src($featured_image_id, 'full');
                    // Check if the image URL is available
                    if ($image_url) { ?>
                        <img class="object-fit-cover blog-image w-100" width="1300" height="600"
                             src="<?= $image_url[0]; ?>" alt="<?= the_title(); ?>" title="<?= the_title(); ?>">
                    <?php } ?>
                </div>
            </div>
        <div style="padding-top: 140px;background-color: #f4f4f4">
            <div class="custom-container min-vh-100 position-relative">
                <div class="row g-4 py-4 align-items-lg-start">
                    <div class="col-lg-3 col-12">
                        <div class="sidebar-area shadow-sm bg-white <?= $lan == 'en' ? '' : 'ps-4'; ?>">
                            <p class="pt-3 fs-4 pb-0 mb-0 text-dark <?= $lan == 'en' ? 'text-center' : 'text-start'; ?>">
                                <?= $lan == 'en' ? 'Table of Content' : 'فهرست'; ?>
                            </p>
                            <div class="<?= $lan == 'en' ? 'px-5' : 'px-4'; ?>">
                                <div class="d-flex align-items-center">
                                    <?php
                                    // Get the min-heading and max-heading values from the options
                                    $tableOfContent = get_field('table_of_content', 'option');
                                    $min_heading = $tableOfContent['min-heading'] ?? 2;
                                    $max_heading = $tableOfContent['max-heading'] ?? 4;

                                    // Output the TOC shortcode with the dynamic values
                                    echo do_shortcode('[TOC from_tag="' . $min_heading . '" to_tag="' . $max_heading . '"]');
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <article class="col-lg-9 col-12 text-justify text-dark lh-lg sidebar-container">
                        <div class="content bg-white py-3 h-100 shadow-sm gx-0 <?= $lan == 'en' ? 'pe-4' : 'pe-0'; ?>">
                            <div id="single-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="text-center border-top border-1 border-danger mt-5 <?= $lan == 'en' ? 'd-none' : ''; ?>">
                                <?php
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;
                                ?>
                            </div>
                        </div>

                    </article>
                </div>
            </div>
        </div>
        <div style="background-color: #f1f1f1">
            <div class="custom-container">
                <div class="row justify-content-center align-items-stretch">
                    <div class="col-12 py-5">
                        <p class="pb-lg-5 pb-2 text-dark text-center fs-3 fw-bolder"><?= $lan == 'en' ? 'Related Posts' : 'مطالب مرتبط'; ?></p>
                        <div class="row row-gap-4 gap-lg-0 pb-5 pb-lg-0">
                            <?php
                            // Get the current post ID
                            $current_post_id = get_the_ID();

                            // Get the current post categories
                            $current_post_categories = wp_get_post_categories($current_post_id);

                            // Query related posts
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => 4, // Adjust the number of related posts you want to display
                                'post__not_in' => array($current_post_id), // Exclude the current post
                                'category__in' => $current_post_categories, // Show posts from the same categories
                            );

                            $related_posts_query = new WP_Query($args);
                            if ($related_posts_query->have_posts()) : $i = 0;
                                /* Start the Loop */
                                while ($related_posts_query->have_posts()) :
                                    $related_posts_query->the_post(); ?>
                                    <div class="col-lg-3 col-md-6 col-12">
                                        <?php get_template_part('template-parts/blog-post'); ?>
                                    </div>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('[data-scroll-to]').forEach(function (link) {
                link.addEventListener('click', function (event) {
                    const targetId = this.getAttribute('data-scroll-to');
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        });
    </script>
<?php endwhile;
wp_reset_query(); ?>
<?php get_footer(); ?>