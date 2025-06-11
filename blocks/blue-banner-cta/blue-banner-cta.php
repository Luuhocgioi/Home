<?php
/**
 * Blue Banner CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   int $post_id The post ID this block is saved to.
 */

// Create id attribute for specific styling.
$id = 'blue-banner-cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute for specific styling.
$className = 'blue-banner-cta';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and handle defaults.
$content_text = get_field('content_text');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php if ($content_text) : ?>
            <div class="cta-content">
                <?php echo $content_text; // Assuming Wysiwyg Editor, so output raw ?>
            </div>
        <?php endif; ?>
    </div>
</section> 