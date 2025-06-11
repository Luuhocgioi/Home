<?php
/**
 * Disclaimer Section Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'disclaimer-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'disclaimer-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$disclaimer_text = get_field('disclaimer_text');
$disclaimer_title = get_field('disclaimer_title');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if ($disclaimer_title) : ?>
            <h2 class="disclaimer-title"><?php echo esc_html($disclaimer_title); ?></h2>
        <?php endif; ?>
        <?php if ($disclaimer_text) : ?>
            <div class="disclaimer-content">
                <?php echo $disclaimer_text; // Wysiwyg Editor, so output raw ?>
            </div>
        <?php endif; ?>
    </div>
</section> 