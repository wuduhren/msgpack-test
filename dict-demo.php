<?php
$content = file_get_contents('simple.json');

//turn json into dictionary
$content_decode = json_decode($content);

//do all kinds of manipulation
foreach ($content_decode as $person) {
    print_r($person->name."\n");
}

//turn dictionary back into json
$content = json_encode($content_decode);

file_put_contents('simple.json', $content);
?>