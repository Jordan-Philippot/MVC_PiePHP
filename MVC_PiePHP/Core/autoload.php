<?php
spl_autoload_register(function ($class) {
    $namespace = explode("\\", $class);

    if ($namespace[0] === "Core") {
        include $namespace[1] . '.php';
    } elseif ($namespace[0] === "Model" || $namespace[0] === "Controller") {
        include "src/" . $namespace[0] . "/" . $namespace[1] . '.php';
    } else {
        return false;
    }
});
 
// spl_autoload_register("myAutoLoader");
// function myAutoLoader(string $className)
// {
//     $path = "./";
//     $extension = ".php";
//     $fullpath = $path . $className . $extension;
//     if (!file_exists($fullpath)) {
//         return false; // If the file doesn't exist we wont include it
//     }
//     require_once $fullpath;
// }
