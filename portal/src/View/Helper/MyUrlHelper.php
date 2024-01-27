<?php
namespace App\View\Helper;

use Cake\Routing\Router;
use Cake\View\Helper;

class MyUrlHelper extends Helper
{
    /**
     * Generate URL to a controller action.
     *
     * @param  string $controller Controller name
     * @param  string $action     Action name
     * @param  array  $params     Additional parameters
     * @return string Generated URL
     */
    public static function generateUrl($controller, $action, $params = [])
    {
        return Router::url(
            array_merge(
                ["controller" => $controller, "action" => $action],
                $params
            )
        );
    }
}
