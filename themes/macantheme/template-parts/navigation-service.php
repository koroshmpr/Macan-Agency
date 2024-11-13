<?php
// Inside the single-services.php or single.php template

// Get the current post ID
$current_post_id = get_the_ID();

// Get the previous post ID
$previous_post = get_previous_post();
$previous_post_id = $previous_post ? $previous_post->ID : '';

// Get the next post ID
$next_post = get_next_post();
$next_post_id = $next_post ? $next_post->ID : '';
global $lan;

if ($lan == 'en') {
    //    first Item in Farsi
    if (empty($previous_post) && !empty($next_post)) {
        $navigationStyle = 'flex-row-reverse justify-content-start';
        $flexDirectionPrev = 'flex-row-reverse';
    } elseif (!empty($previous_post) && empty($next_post)) {
//        last Item in Farsi
        $navigationStyle = 'flex-row-reverse justify-content-end';
        $flexDirectionNext = 'flex-row';
    } else {
        $navigationStyle = 'flex-row justify-content-between';
        $flexDirectionNext = 'flex-row';
        $flexDirectionPrev = 'flex-row-reverse';
    }
} else {
//    first Item in Farsi
    if (empty($previous_post) && !empty($next_post)) {
        $navigationStyle = 'flex-row justify-content-end';
        $flexDirectionPrev = 'flex-row-reverse';
    } elseif (!empty($previous_post) && empty($next_post)) {
//        last Item in Farsi
        $navigationStyle = 'flex-row justify-content-start';
        $flexDirectionNext = 'flex-row';
    } else {
        $navigationStyle = 'flex-row justify-content-between';
        $flexDirectionNext = 'flex-row';
        $flexDirectionPrev = 'flex-row-reverse';
    }
}

?>
<div class="position-absolute bottom-0 w-100 d-inline-flex pb-2 mb-4 z-top px-3 <?= $navigationStyle; ?>">
    <?php if (!empty($previous_post_id)) :
        $prev_title = $previous_post->post_title;
        ?>
        <a href="<?php echo get_permalink($previous_post_id); ?>"
           class="previous-post d-inline-flex text-end gap-1 align-items-center justify-content-center <?= $flexDirectionNext; ?>">
            <?php if ($lan == 'fa') : ?>
                <svg width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
            <?php elseif ($lan == 'en') : ?>
                <svg width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            <?php endif; ?>
            <h6 class="mb-0 lh-base pt-1"><?php echo esc_html($prev_title); ?></h6>
        </a>
    <?php endif;

    if (!empty($next_post_id)) :
        $next_title = $next_post->post_title;
        ?>
        <a href="<?php echo get_permalink($next_post_id); ?>"
           class="next-post d-inline-flex text-end gap-1 align-items-center justify-content-center <?= $flexDirectionPrev; ?>">
            <?php if ($lan == 'en') : ?>
                <svg width="20" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                </svg>
            <?php elseif ($lan == 'fa') : ?>
                <svg width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
            <?php endif; ?>
            <h6 class="mb-0 lh-base pt-1"><?php echo esc_html($next_title); ?></h6>

        </a>
    <?php endif; ?>
</div>
