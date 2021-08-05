<?php
$start = microtime(true);

require_once("cache-functions.php");

$page = "home.php";
$cacheMaxAge = 86400; // One Day

$cachedData = cacheRead($page, $cacheMaxAge);

if($cachedData != NULL){
    echo $cachedData;
    // die; // Commented to measure execution time
}
else{
    ob_start();
    include($page);

    $page_content = ob_get_contents();

    cacheWirte($page, $page_content);

    ob_end_flush();
}
echo "<p>Execution time: ". round(microtime(true) - $start, 3) . "</p>";