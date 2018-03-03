<?php
session_start();

function __autoload($className)
{
    $className = explode('\\', $className);
    $className = array_pop($className);

    require_once 'src/core/' . $className . '.php';
}

require_once 'src/index.php';
