<?php

include('../simple-php-unit-test/simple-php-unit-test.php');

function a_function_to_be_test ( $input){
	if($input === 'hello'){
		return true;
	}else{
		return false;
	}
}

$spec = new SimplePHPUnitTest();


$spec->describe('a_function_to_be_test input hello should be true', function(){
	expect::true(a_function_to_be_test('hello'));
	// expect_true(false);
});


$spec->describe('a_function_to_be_test input not hello should be false', function(){
	$r = a_function_to_be_test('yppppppppp');
	expect::false($r);
});

$spec->describe('a_function_to_be_test should failed', function(){
	$r = a_function_to_be_test('yppppppppp');
	expect::true($r);
});

$spec->start();

// $a = a_function_to_be_test('yppppppppp');

// var_dump($a);