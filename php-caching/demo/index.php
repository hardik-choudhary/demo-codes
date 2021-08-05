<?php

$start = microtime(true);

require_once("class.php");

$cache = new Cache('cache');

$page = "home.php";
$cacheMaxAge = 86400; // One Day

$cachedData = $cache->read($page, $cacheMaxAge);

if($cachedData != NULL){
    echo $cachedData;
    echo $cache->getTime($page);
    // die; // Commented to measure execution time
}
else{
    ob_start();
    include($page);

    $page_content = ob_get_contents();

    $cache->write($page, $page_content);

    ob_end_flush();
}

echo "<p>Execution time: ". round(microtime(true) - $start, 3) . "</p>";