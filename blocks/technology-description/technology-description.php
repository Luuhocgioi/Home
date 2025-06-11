<?php
/**
 * Technology Description Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'technology-description-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'technology-description';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$image = get_field('image');
$title = get_field('title');
$description = get_field('description');
$button_text = get_field('button_text');
$button_url = get_field('button_url');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if ($image) : ?>
            <div class="tech-image">
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            </div>
        <?php endif; ?>
        <div class="tech-content">
            <?php if ($title) : ?>
                <h2 class="tech-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="tech-description-text"><?php echo $description; ?></div>
            <?php endif; ?>

            <?php if ($button_text && $button_url) : ?>
                <a href="<?php echo esc_url($button_url); ?>" class="button primary"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
        </div>
    </div>
</section> 