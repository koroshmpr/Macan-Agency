<div data-aos="zoom-in" class="position-relative overflow-hidden"
         title="<?= get_the_title(); ?>">
    <?php
    // You can display the category name here if needed
    $categories = get_the_category();
    if ($categories) {
        $category = $categories[0];
        ?>
        <span class="d-inline-block position-absolute top-0 end-0 z-top p-2 small text-white"
              style="background-color: rgba(0, 0, 0, .5) !important"><?= $category->name; ?></span>
    <?php } ?>
    <a target="_blank" href="<?php the_permalink(); ?>">
        <div class="ratio ratio-16x9">
            <img src="<?php echo the_post_thumbnail_url(); ?>"
                 class="object-fit" alt="<?= get_the_title(); ?>">
        </div>
        <div class="position-absolute bottom-0 start-0 h-100 w-100 d-flex justify-content-center align-items-end">
            <div class="textBlog h-100 w-100 text-center lazy">
                <p class="title text-center text-white px-3 position-absolute bottom-0 start-0 end-0 lazy"><?= get_the_title(); ?></p>
                <div class="excerpt position-absolute lh-lg bottom-0 start-0 end-0 mb-3 fs-6 text-white lazy px-3"><?= wp_trim_words(get_the_content(), 20); ?></div>
            </div>
        </div>
    </a>
</div>