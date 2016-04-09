<?php

function template($name, array $vars = [])
{
    if (!is_file($name)) {
        throw new exception("Could not load template file {$name}");
    }
    ob_start();
    extract($vars);
    require($name);
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
}