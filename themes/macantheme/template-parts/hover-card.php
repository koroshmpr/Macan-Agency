<?php
global $lan;
$lan = apply_filters('wpml_current_language', NULL);
$category_detail = get_the_terms(get_the_ID(), 'portfolio_categories');

if ($category_detail[0]->term_id == 18 && is_post_type_archive('portfolio')) {
    $ratio = 'ratio-1x1 ratio';
} elseif ($category_detail[0]->term_id == ($lan == 'en' ? 31 : 17) && is_post_type_archive('portfolio')) {
    $ratio = 'ratio-1x1 ratio';
} else {
    $ratio = 'ratio-16x9 ratio';
}

?>

<div
        class="d-inline-block m-0 p-0 overflow-hidden position-relative h-100 w-100 direction-aware-hover">
    <div class="direction-aware-hover__left bottom-0 start-0 end-0 top-0 p-0 position-absolute z-1"></div>
    <div class="direction-aware-hover__right bottom-0 start-0 end-0 top-0 p-0 position-absolute z-1"></div>
    <div class="direction-aware-hover__top bottom-0 start-0 end-0 top-0 p-0 position-absolute z-1"></div>
    <div class="direction-aware-hover__bottom bottom-0 start-0 end-0 top-0 p-0 position-absolute z-1"></div>
    <div class="h-100 <?= $args['ratio'] ?? $ratio; ?>">

        <?php $archive_image = get_field('cover_image_for_archive'); ?>
        <img src="<?php echo $archive_image['url']; ?>" class="object-fit"
             width="360" height="210"
             title="<?php the_title(); ?>"
             alt="<?php the_title(); ?>">

    </div>
    <div class="direction-aware-hover__content position-absolute start-0 end-0 p-0 end-0 w-100 h-100 d-flex justify-content-center align-items-center flex-column">
        <a class="text-center fs-5" href="<?php echo get_permalink(); ?>">
                <?php the_title(); ?>
        </a>
        <div class="small">
             <?php foreach ($category_detail as $term) { ?>
                 <p data-category-id="<?php echo $term->term_taxonomy_id; ?>" class="btn-success categoryClick">
                     <?php echo $term->name; ?>
                 </p>
             <?php } ?>
        </div>
    </div>
</div>

