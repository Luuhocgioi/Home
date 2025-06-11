<?php
/**
 * About Us/Image with Text Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'about-us-image-text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'about-us-image-text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$headline = get_field('headline');
$description = get_field('description');
$button_text = get_field('button_text');
$button_url = get_field('button_url');
$image = get_field('image');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="content-left">
            <?php if ($headline) : ?>
                <h2 class="headline"><?php echo esc_html($headline); ?></h2>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="description"><?php echo $description; // Assuming Wysiwyg Editor, so output raw ?></div>
            <?php endif; ?>
            <?php if ($button_text && $button_url) : ?>
                <a href="<?php echo esc_url($button_url); ?>" class="button primary"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
        </div>
        <?php if ($image) : ?>
            <div class="image-right">
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            </div>
        <?php endif; ?>
    </div>
</section> 