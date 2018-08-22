<?php

//dictionary
$data = array(
	'name'=>'chris', 
	'age'=>26,
	'hobby'=>['read', 'write']
);

//dictionary to MessagePack
$msg = msgpack_pack($data);
file_put_contents('msgpack.txt', $msg);


//MessagePack back to dictionary
$data = msgpack_unpack($msg);
print_r($data);

?>