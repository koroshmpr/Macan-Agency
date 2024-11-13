<?php
/** Template Name: services Page */
global $lan;
get_header(); ?>

<section class="bg-danger p-5 min-vh-100 <?= $lan == 'en' ? 'lang-en' : ''; ?>">
    <h1 class="text-center text-white py-4"><?= $lan == 'en' ? 'Our Services' : ' خدمات ما'; ?></h1>
    <div class="row w-100 g-2 mx-0">
        <?php
        $args = array(
            'post_type' => 'services',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => '-1',
        );
        $loop = new WP_Query($args);

        if ($loop->have_posts()) {
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <?php get_template_part('template-parts/archive-blog-card'); ?>
                </div>
            <?php endwhile;
        }
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php get_footer(); ?>
