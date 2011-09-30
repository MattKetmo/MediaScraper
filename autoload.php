<?php

require_once __DIR__.'/vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'       => __DIR__.'/vendor',
    'Goutte'        => __DIR__.'/vendor/Goutte/src',
    'Zend'          => __DIR__.'/vendor/zend/library',
    'MediaScraper'  => __DIR__.'/src',
));
$loader->register();
