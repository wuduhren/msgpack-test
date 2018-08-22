<?php

$content = file_get_contents('large.json');
$run = 10000;

test();

function test(){
	global $content, $run;

	// test json decode
	$start = microtime(true);
	for ($i=0; $i<$run ; $i++) { 
		$content_decode = json_decode($content);
		// print_r($content_decode);
	}
	$time_elapsed_secs = microtime(true) - $start;
	print_r('json decode took: '.$time_elapsed_secs.'<br>');


	// test json encode
	$start = microtime(true);
	for ($i=0; $i<$run ; $i++) { 
		$content_encode = json_encode($content_decode);
		// print_r($content_encode);
	}
	$time_elapsed_secs = microtime(true) - $start;
	print_r('json encode took: '.$time_elapsed_secs.'<br>');


	// test pack
	$start = microtime(true);
	for ($i=0; $i<$run ; $i++) { 
		$content_packed = msgpack_pack($content_decode);
		// print_r($content_packed);
	}
	$time_elapsed_secs = microtime(true) - $start;
	print_r('packing took: '.$time_elapsed_secs.'<br>');


	// test unpack
	$start = microtime(true);
	for ($i=0; $i<$run ; $i++) { 
		$content_unpacked = msgpack_unpack($content_packed);
		// print_r($content_unpacked);
	}
	$time_elapsed_secs = microtime(true) - $start;
	print_r('unpacking took: '.$time_elapsed_secs.'<br>');

	print_r('json encoded string length: '.strlen($content_encode).'<br>');
	print_r('packed string length: '.strlen($content_packed).'<br>');
}

?>