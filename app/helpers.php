<?php
declare(strict_types = 1);

if (!function_exists('dd')) {
    /**
     * Dump and end script execution
     *
     * @return void
     */
    function dd($args)
    {
        dump($args);
        exit();
    }
}
