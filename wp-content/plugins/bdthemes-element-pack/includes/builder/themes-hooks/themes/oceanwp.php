<?php

namespace ElementPack\Builder\Themes_Hooks;

defined('ABSPATH') || exit;

/**
 * Oceanwp theme compatibility.
 */
class Oceanwp {

    /**
     * Instance of Elementor Frontend class.
     *
     * @var \Elementor\Frontend()
     */
    private $elementor;

    private $header;
    private $footer;

    /**
     * Run all the Actions / Filters.
     */
    function __construct($template_ids) {
        $this->header = $template_ids[0];
        $this->footer = $template_ids[1];

        if (defined('ELEMENTOR_VERSION') && is_callable('Elementor\Plugin::instance')) {
            $this->elementor = \Elementor\Plugin::instance();
        }

        if ($this->header != null) {
            add_action('template_redirect', array($this, 'remove_theme_header_markup'), 10);
            add_action('ocean_header', array($this, 'add_plugin_header_markup'));
        }

        if ($this->footer != null) {
            add_action('template_redirect', array($this, 'remove_theme_footer_markup'), 10);
            add_action('ocean_footer', array($this, 'add_plugin_footer_markup'));
        }
    }

    // header actions
    public function remove_theme_header_markup() {
        remove_action('ocean_top_bar', 'oceanwp_top_bar_template');
        remove_action('ocean_header', 'oceanwp_header_template');
        remove_action('ocean_page_header', 'oceanwp_page_header_template');
    }

    public function add_plugin_header_markup() {
        do_action('bdt-templates-builder/template/before_header');
        echo '<div class="bdt-template-content-markup bdt-template-content-header">';
        echo bdt_templates_render_elementor_content($this->header); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --  Displaying with Elementor content rendering
        echo '</div>';
        do_action('bdt-templates-builder/template/after_header');
    }


    // footer actions
    public function remove_theme_footer_markup() {
        remove_action('ocean_footer', 'oceanwp_footer_template');
    }

    public function add_plugin_footer_markup() {
        do_action('bdt-templates-builder/template/before_footer');
        echo '<div class="bdt-template-content-markup bdt-template-content-footer">';
        echo bdt_templates_render_elementor_content($this->footer); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --  Displaying with Elementor content rendering
        echo '</div>';
        do_action('bdt-templates-builder/template/after_footer');
    }
}
