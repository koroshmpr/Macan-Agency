<?php
global $lan; ?>
<div class="col-lg-6 text-center ps-0 ps-lg-5 d-flex flex-column align-items-lg-start align-items-center justify-content-center gap-4">
    <div class="d-flex flex-column align-items-center justify-content-between">
        <img width="150" height="100" class="mb-4 object-fit-contain order-lg-1 order-2"
             src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?= get_the_title(); ?>"
             title="<?= get_the_title(); ?>">
        <h1 class="fs-4 text-white mb-lg-5 mb-2 order-lg-2 order-1">
            <?php the_title(); ?>
        </h1>
        <h3 class="fs-6 text-white order-lg-3 order-3">
            <?php the_field('subtitle_text'); ?>
        </h3>
        <span class="text-white order-lg-4 order-4 <?= $lan != 'en' ? 'ff-yekan' : ''; ?>">
                <?php the_field('date'); ?>
            </span>
        <div class="text-white lh-lg mt-5 px-3 px-lg-0 order-lg-5 order-5">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php $count = count(get_field('gallery'));
?>
<div class="<?= $count <= 3 ? 'col-11 col-md-3 py-5' : 'col-11 col-md-5'; ?> mx-auto">
    <?php
    get_template_part('template-parts/portfolio/gallery');
    ?>
</div>