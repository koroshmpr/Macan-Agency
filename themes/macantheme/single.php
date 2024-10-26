<?php get_header();

$url = $_SERVER["REQUEST_URI"];
$slugEN = strpos($url, '/en/') !== false;


while (have_posts()) :
    the_post();
    ?>
    <div class="position-fixed blog-progress w-100 z-1">
        <progress class="w-100 lazy" max="100" value="0"></progress>
    </div>
    <section class="min-vh-100 <?php echo $slugEN ? 'lang-en' : ''; ?>">
        <div class="bg-danger" style="padding-top: 120px">
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
                <h1 class="fs-4 text-white my-3 ff-yekan">
                    <?php the_title(); ?>
                </h1>
                <div class="d-inline-flex align-items-center gap-lg-3 gap-2 mb-3">
                    <div class="border-1 border-white border col-3 text-white d-flex align-items-center justify-content-center"
                         style="width: 60px;height: 60px">
                        <i class="bi bi-person fs-3 fw-light d-flex align-items-center justify-content-center"></i>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start gap-lg-3">
                        <span class="fw-normal text-white fw-lighter">
                            <?php
                            $author_id = get_the_author_meta('ID');
                            $author_en = get_field('name_en', 'user_' . $author_id); ?>
                            <?= $slugEN ? $author_en : get_the_author_meta('display_name', $post->post_author); ?>

                        </span>
                        <div class="d-inline-flex flex-wrap text-white gap-1 gap-lg-3 align-items-center fw-lighter">
                            <p class="d-flex gap-2 align-content-center mb-0" style="line-height:1.2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-clock-history" viewBox="0 0 16 16">
                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483m.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                <?php echo get_the_date('d  F , Y'); ?></p>
                            <?php $updated_date = get_the_modified_date('d F, Y'); ?>

                            <!--                            <p class="d-flex gap-1 align-content-center mb-0" style="line-height:1.2">-->
                            <div class="dropdown d-flex align-items-center gap-1">
                                <button class="btn p-1 rounded-circle text-white" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false"
                                        aria-labelledby="reversion-list">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                         class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                                    </svg>
                                </button>
                                <?php
                                // Get post ID
                                $post_id = get_the_ID();

                                // Get all post revisions
                                $revisions = wp_get_post_revisions($post_id);

                                // Check if there are revisions
                                if ($revisions) {
                                    // Create an array to store unique dates
                                    $unique_dates = array();

                                    // Loop through each revision
                                    foreach ($revisions as $revision) {
                                        $revision_date = get_the_modified_date('d F, Y', $revision->ID);

                                        // Check if the date is not already in the array
                                        if (!in_array($revision_date, $unique_dates)) {
                                            $unique_dates[] = $revision_date;
                                        }
                                    }

                                    // Get the post created date
                                    $created_date = get_the_date('d F, Y', $post_id);

                                    // Remove the created date from the array (if it exists)
                                    $created_date_index = array_search($created_date, $unique_dates);
                                    if ($created_date_index !== false) {
                                        unset($unique_dates[$created_date_index]);
                                    }

                                    // Sort the other dates in ascending order (oldest first)
                                    sort($unique_dates);

                                    // Add the created date to the beginning of the array
                                    array_unshift($unique_dates, $created_date);

                                    // Get the last modified date
                                    $last_modified_date = get_the_modified_date('d F, Y', $post_id);

                                    // Remove any duplicate last modified date
                                    $unique_dates = array_unique($unique_dates);

                                    // Output the sorted and unique dates
                                    echo '<ul id="reversion-list" class="dropdown-menu dropdown-menu-dark">';
                                    foreach ($unique_dates as $index => $date) {
                                        echo '<li class="dropdown-item">' . $date . '</li>';
                                        if ($index == 0) {
                                            echo '<li><hr class="dropdown-divider mt-0"></li>';
                                        }
                                    }
                                    echo '</ul>';
                                } else {
                                    echo 'No revisions found.';
                                }
                                ?>


                                <?= $updated_date; ?></p>
                            </div>
                            <div class="d-none d-md-inline vr bg-white opacity-100"></div>

                            <span class="text-semi-light fs-6 ff-yekan">
                                <?php echo $slugEN ? 'Reading Time : ' . reading_time() . ' mins' : 'مدت زمان مطالعه ' . reading_time() . ' دقیقه'; ?>
                            </span>
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
                        <img class="object-fit-cover w-100" width="1300" height="600"
                             src="<?php echo $image_url[0]; ?>" alt="<?= the_title(); ?>" title="<?= the_title(); ?>">
                    <?php } ?>
                </div>
            </div>
        </div>
        <div style="padding-top: 140px;background-color: #f4f4f4">
            <div class="custom-container min-vh-100 position-relative">
                <div class="row g-4 py-4 align-items-lg-start">
                    <div class="col-lg-3 col-12">
                        <div class="sidebar-area shadow-sm bg-white <?php echo $slugEN ? '' : 'ps-4'; ?>">
                            <p class="pt-3 fs-4 pb-0 mb-0 text-dark <?php echo $slugEN ? 'text-center' : 'text-start'; ?>">
                                <?php echo $slugEN ? 'Table of Content' : 'فهرست'; ?>
                            </p>
                            <div class="<?php echo $slugEN ? 'px-5' : 'px-4'; ?>">
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
                        <div class="content bg-white py-3 h-100 shadow-sm gx-0 <?php echo $slugEN ? 'pe-4' : 'pe-0'; ?>">
                            <div id="single-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="text-center border-top border-1 border-danger mt-5 <?php echo $slugEN ? 'd-none' : ''; ?>">
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
                        <p class="pb-lg-5 pb-2 text-dark text-center fs-3 fw-bolder"><?php echo $slugEN ? 'Related Posts' : 'مطالب مرتبط'; ?></p>
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
<?php endwhile;
wp_reset_query(); ?>
<?php get_footer(); ?>