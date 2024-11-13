<?php
$taxonomy = 'portfolio_categories'; // change to your custom taxonomy name
$term_id = get_queried_object_id();
$previous_post = get_adjacent_post(true, '', true, $taxonomy);
$next_post = get_adjacent_post(true, '', false, $taxonomy);
global $lan;
?>
<div class="position-absolute <?= $lan == 'en' ? 'flex-row-reverse' : 'flex-row'; ?> bottom-0 w-100 d-inline-flex <?php echo empty($previous_post) ? 'justify-content-end' : 'justify-content-between' ?>  pb-2 mb-4"  >
    <?php
    if (!empty($previous_post)) :
        $prev_title = $previous_post->post_title;
        $prev_link = get_permalink($previous_post->ID);
        if (has_term('', $taxonomy, $previous_post)) : ?>
            <a href="<?php echo esc_url($prev_link); ?>"
               class="previous-post d-inline-flex text-end gap-1 align-items-center justify-content-center <?= $lan == 'en' ? 'flex-row-reverse' : 'flex-row'; ?>">
                <svg width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
                <h6 class="mb-0 lh-base pt-1 fade-in-navigation"><?php echo esc_html($prev_title); ?></h6>
            </a>
        <?php endif;
    endif;


    if (is_singular('portfolio')) { ?>
        <a href="<?php echo get_post_type_archive_link('portfolio'); ?>"
           class="text-white btn position-absolute start-50 translate-middle-x bottom-0">
            <svg width="25" height="25" fill="currentColor" class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16">
                <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
            </svg>
        </a>
    <?php }
    if (!empty($next_post)) :
        $next_title = $next_post->post_title;
        $next_link = get_permalink($next_post->ID);
        if (has_term('', $taxonomy, $next_post)) : ?>
            <a href="<?php echo esc_url($next_link); ?>"
               class="next-post d-inline-flex text-end gap-1 align-items-center justify-content-center <?= $lan == 'en' ? 'flex-row-reverse' : 'flex-row'; ?>">
                <h6 class="mb-0 lh-base pt-1 fade-in-navigation"><?php echo esc_html($next_title); ?></h6>
                <svg width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            </a>
        <?php endif;
    endif;
    ?>
</div>
