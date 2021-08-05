<?php

require_once("functions.php");

// $myArray = array('Hello', 'how', 'are', 'you', 'reply' => ['fine', 'and', 'you']);

// cacheWirte('myArray', json_encode($myArray));

$cache = cacheRead('myArray');

$cachedArray = json_decode($cache, true);

print_r($cachedArray);