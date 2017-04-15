<?php

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
