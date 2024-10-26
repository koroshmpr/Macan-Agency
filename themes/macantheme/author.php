<?php
// Include necessary header
get_header();

$authorsAllow = get_field('author-list', 'option');
$allowed_author_ids = array_column($authorsAllow, 'ID');
// Get author ID from the URL
$author_id = get_the_author_ID(); ?>
<section class="min-vh-100 bg-danger text-white py-5">
    <div class="container">
        <div class="row gy-4 justify-content-center align-content-center">
            <?php // Check if the current author is allowed
            if (in_array($author_id, $allowed_author_ids)) {
                // Get author information
                $author = get_userdata($author_id);

                // Check if the author exists
                if ($author) {
                    // Display author information
                    echo '<h1 data-aos="fade-left">' . esc_html($author->display_name) . '</h1>';
                    echo '<p data-aos="fade-left" data-aos-delay="200" class="lh-lg text-justify">' . esc_html($author->description) . '</p>';
                    // Add more details as needed
                    if (!empty($author->user_url)) {
                        echo '<p>وبسایت : <a href="' . esc_url($author->user_url) . '">' . esc_html($author->user_url) . '</a></p>';
                    }

                    // Display author's email
                    if (!empty($author->user_email)) {
                        echo '<p>ایمیل : <a href="mailto:' . esc_attr($author->user_email) . '">' . esc_html($author->user_email) . '</a></p>';
                    }
                    // Display author's social media links
                    echo '<p>شبکه های اجتماعی:</p>';
                    // Add code to display social media links

                    // Display posts by the author
                    echo '<h2 class="fs-3 text-center pb-3">مقالات</h2>';
                    // Query to get posts by the current author
                    $args = array(
                        'author' => $author_id,
                        'posts_per_page' => -1, // Display all posts by the author
                    );

                    $author_posts = new WP_Query($args);

                    if ($author_posts->have_posts()) { ?>
                        <div class="row w-100 gy-1 mx-0 overflow-y-scroll bg-white p-4" style="height: 300px;">
                            <?php while ($author_posts->have_posts()) {
                                $author_posts->the_post(); ?>
                                    <a class="bg-danger p-3 col-md-6 border-end border-white border-5"
                                       href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>
                            <?php }
                            wp_reset_postdata(); // Reset post data to the main loop
                            ?>
                        </div>
                    <?php } else {
                        echo '<p class="text-white text-center fs-2">مقاله ای یافت نشد</p>';
                    }
                } else {
                    // Display a message if the author is not found
                    echo '<p>Author not found.</p>';
                }
            } else {
                wp_redirect(home_url());
                exit();
            }
            ?>
        </div>
    </div>
</section>
<?php // Include necessary footer
get_footer();
?>
