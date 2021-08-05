<?php

require_once("cache-functions.php");

$myArray = array('Hello', 'how', 'are', 'you', 'reply' => ['fine', 'and', 'you']);

cacheWirte('myArray', json_encode($myArray));

$cachedArray = json_decode(cacheRead('myArray'), true);

print_r($cachedArray);