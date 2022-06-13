<?php

namespace SpringDevs\WcPips;

/**
 * Scripts and Styles Class
 */
class Assets
{
    /**
     * Assets constructor.
     */
    function __construct()
    {
        if (is_admin()) {
            add_action('admin_enqueue_scripts', [$this, 'register'], 5);
        } else {
            add_action('wp_enqueue_scripts', [$this, 'register'], 5);
        }
    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     */
    public function register()
    {
        $this->register_scripts($this->get_scripts());
        $this->register_styles($this->get_styles());
    }

    /**
     * Register scripts
     *
     * @param array $scripts
     *
     * @return void
     */
    private function register_scripts(array $scripts)
    {
        foreach ($scripts as $handle => $script) {
            $deps      = $script['deps'] ?? false;
            $in_footer = $script['in_footer'] ?? false;
            $version   = $script['version'] ?? PIPS_VERSION;

            wp_register_script($handle, $script['src'], $deps, $version, $in_footer);
        }
    }

    /**
     * Register styles
     *
     * @param array $styles
     *
     * @return void
     */
    public function register_styles(array $styles)
    {
        foreach ($styles as $handle => $style) {
            $deps = $style['deps'] ?? false;

            wp_register_style($handle, $style['src'], $deps, PIPS_VERSION);
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     */
    public function get_scripts(): array
    {
        $plugin_js_assets_path = PIPS_ASSETS . '/js/';

        return [
            "sdevs_installer" => [
                'src' => $plugin_js_assets_path . 'installer.js',
                'deps' => ['jquery'],
                'in_footer' => true
            ]
        ];
    }

    /**
     * Get registered styles
     *
     * @return array
     */
    public function get_styles(): array
    {
        $plugin_css_assets_path = PIPS_ASSETS . '/css/';

        return [
            "pips_admin_css" => [
                "src" => $plugin_css_assets_path . "admin.css"
            ],
            "sdevs_installer" => [
                "src" => $plugin_css_assets_path . "installer.css"
            ]
        ];
    }
}
