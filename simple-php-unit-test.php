<?php
/*
	USEAGE:

	GO READ THE README.md
*/


function expect_true( $input){
	if( $input === true){

	}else{
		$err = 'expect true but return "' . $input . '"';
		echo "\n" . $err . "\n";
		// echo "\n" . $err;
		throw new Exception($err);
	}
}

function expect_false( $input){
	if( $input === true){
		$err = 'expect false but return "' . $input . '"';
		echo "\n" . $err . "\n";
		// echo "\n" . $err;
		throw new Exception($err);
	}
}

function describe($desc, $callback){
	echo $desc . ' .............. ';

	$is_passed = true;

	try{
		$callback();
	} catch(Exception $e){
		$is_passed = false;
	}

	if( $is_passed ){
		echo "\033[0;32m" . 'passed' . "\033[0m";
	}else{
		echo "\033[1;31m" . 'falied' . "\033[0m";
	}

	echo "\n";
}