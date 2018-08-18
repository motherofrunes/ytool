<?php
/**
 * Created by PhpStorm.
 * User: yyasui
 * Date: 2018/08/11
 * Time: 4:38
 */

namespace App\Contracts\Routing;


use Illuminate\Routing\UrlGenerator;

class YUrlGenerator extends UrlGenerator
{
    /**
     * Create a new manager instance.
     *
     * @param Illuminate\Routing\UrlGenerator $url
     */
    public function __construct(UrlGenerator $url)
    {
        parent::__construct($url->routes, $url->request);
    }

    /**
     * Format the given URL segments into a single URL.
     *
     * @param  string  $root
     * @param  string  $path
     * @return string
     */
    public function format($root, $path)
    {
        $path = parent::format($root, $path);

        $mathes = null;
        preg_match("/([^\/]+?)?$/", $path, $mathes);
        $last = $mathes[0] ?? '';

        if (strpos($last, ".") === false) {
            return $path."/";
        }
        return $path;
    }
}