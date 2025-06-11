<?php
/**
 * Hero Section Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'hero-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'hero-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$eyebrow_lorem = get_field('eyebrow_lorem');
$main_title = get_field('main_title');
$description = get_field('description');
$button_1_text = get_field('button_1_text');
$button_1_url = get_field('button_1_url');
$button_2_text = get_field('button_2_text');
$button_2_url = get_field('button_2_url');
$image = get_field('image');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="hero-content">
            <?php if ($eyebrow_lorem) : ?>
                <p class="eyebrow-lorem"><?php echo esc_html($eyebrow_lorem); ?></p>
            <?php endif; ?>

            <?php if ($main_title) : ?>
                <h1 class="main-title"><?php echo esc_html($main_title); ?></h1>
            <?php endif; ?>

            <?php if ($description) : ?>
                <p class="description"><?php echo esc_html($description); ?></p>
            <?php endif; ?>

            <div class="buttons">
                <?php if ($button_1_text && $button_1_url) : ?>
                    <a href="<?php echo esc_url($button_1_url); ?>" class="button primary"><?php echo esc_html($button_1_text); ?></a>
                <?php endif; ?>

                <?php if ($button_2_text && $button_2_url) : ?>
                    <a href="<?php echo esc_url($button_2_url); ?>" class="button secondary"><?php echo esc_html($button_2_text); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($image) : ?>
            <div class="hero-image">
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            </div>
        <?php endif; ?>
    </div>
</section> 