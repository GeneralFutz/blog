<?php

use \Varyona\Theme;

if (!function_exists('render')) {
    /**
     * Renders a view using the current theme.
     *
     * @return string
     */
    function render(string $view, array $data = [], array $options = [])
    {
        helper('assets');
        if (empty($options['theme'])) {
            $theme = Theme::current();
        }

        //Theme::setTheme($theme);
        $path = Theme::path($theme);

        $renderer = single_service('renderer', $path);

        $viewMeta         = service('viewMeta');
        $data['viewMeta'] = $viewMeta;

        return $renderer->setData($data)
            ->render($view, $options, true);
    }
}
