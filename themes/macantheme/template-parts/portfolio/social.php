<?php
global $lan;
$col_class = get_field('row_width') ?? '';
?>
<div class="<?= $col_class; ?> py-5 text-center <?= $lan == 'en' ? 'lang-en' : ''; ?>">
    <?php
    get_template_part('template-parts/portfolio/gallery');
    ?>

    <div class="row align-items-center justify-content-center py-3 <?= $lan == 'en' ? 'flex-row-reverse' : ''; ?>">
        <div class="col-lg-6 pb-3 pb-lg-0 social_border">
            <div class="text-white lh-2">
                <img width="150" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?= get_the_title(); ?>" title="<?= get_the_title(); ?>">
            </div>
        </div>
        <hr class="border-white border-1 w-25 opacity-100 d-lg-none" >
        <div class="col-lg-6">
            <h1 class="fs-4 text-white">
                <?php the_title(); ?>
            </h1>
            <?php $category_detail = get_field('date'); ?>
            <span class="text-white <?= $lan != 'en' ? 'ff-yekan' : ''; ?>">
                <?= $category_detail; ?>
            </span>
        </div>

    </div>

</div>