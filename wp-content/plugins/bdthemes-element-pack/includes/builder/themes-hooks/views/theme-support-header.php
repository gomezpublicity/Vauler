<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php if (!current_theme_supports('title-tag')) : ?>
        <title>
            <?php echo esc_html(wp_get_document_title()); ?>
        </title>
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('bdt-templates-builder/template/before_header'); ?>
    <div class="bdt-template-content-markup bdt-template-content-header bdt-template-content-theme-support">
        <?php
        $template = \ElementPack\Builder\Activator::template_ids();
        echo bdt_templates_render_elementor_content($template[0]);
        ?>
    </div>
    <?php do_action('bdt-templates-builder/template/after_header'); ?>