<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Varyona\Traits;

use CodeIgniter\View\View;
use Varyona\Config\Themes as ThemeConfig;
use RuntimeException;
use Varyona\Theme;

/**
 * Trait Themeable
 *
 * Provides simple theme functionality to controllers.
 */
trait Themeable
{
    /**
     * The configuration instance
     *
     * @var ThemeConfig
     */
    protected $config;

    /**
     * The folder the theme is stored in (within /themes)
     *
     * @var string
     */
    protected $theme;

    /**
     * Initialize the trait
     */
    protected function initializeThemeable()
    {
        if (!$this->theme) {
            // Load the configuration
            $this->config = config(ThemeConfig::class);
            // Set the theme property from the config
            $this->theme = $this->config->default;
        }
    }

    /**
     * @var View
     */
    protected $renderer;

    protected function render(string $view, array $data = [], ?array $options = null)
    {
        helper('assets');

        $renderer = $this->getRenderer();

        // $viewMeta         = service('viewMeta');
        // $data['viewMeta'] = $viewMeta;

        return $renderer->setData($data)
            ->render($view, $options, true);
    }

    /**
     * Gets a renderer instance pointing to the appropriate
     * theme folder.
     *
     * Note: This should only be called right before use so that
     * the controller has a chance to dynamically update the
     * theme being used.
     *
     * @return mixed|View|null
     */
    protected function getRenderer()
    {
        if ($this->renderer !== null) {
            return $this->renderer;
        }

        Theme::setTheme($this->theme);
        $path = Theme::path();

        if (!is_dir($path)) {
            throw new RuntimeException("`{$this->theme}` is not a valid theme folder.");
        }

        $this->renderer = single_service('renderer', $path);

        return $this->renderer;
    }
}
