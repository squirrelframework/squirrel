<?php

spl_autoload_register(function ($className) {
    static $modules;

    if (!isset($modules)) {
        $find = function ($directory) use (&$find) {
            $modules = array();

            foreach (scandir($directory) as $fileName) {
                if ($fileName === '.' || $fileName === '..') {
                    continue;
                }

                $path = $directory . '/' . $fileName;

                if (!is_dir($path)) {
                    continue;
                }

                if ($fileName === 'library') {
                    $modules[] = realpath($path);
                    continue;
                }

                foreach ($find($path) as $path) {
                    $modules[] = $path;
                }
            }

            return $modules;
        };

        $modules = $find(__DIR__);
    }
    
    $path = str_replace('\\', '/', $className) . '.php';

    foreach ($modules as $module) {
        $fileName = $module . '/' . $path;

        if (!is_file($fileName)) {
            continue;
        }

        require $fileName;
    }
});
