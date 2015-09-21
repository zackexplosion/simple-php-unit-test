# Simple PHP Unit Test

## Usage

include the main file
```php

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
	$r = a_function_to_be_test('hello');
	expect($r)->to_equal(true);
});


$spec->describe('a_function_to_be_test input not hello should be false', function(){
	$r = a_function_to_be_test('yppppppppp');
	expect($r)->to_equal(false);
});

$spec->describe('a_function_to_be_test should failed', function(){
	$r = a_function_to_be_test('yppppppppp');
	expect($r)->to_equal(true);
});

$spec->start();

```

Then run


```
php sample-test.php
```

Output

![Imgur](http://i.imgur.com/HTAFnXg.png)
# Others

You can work with this

<https://github.com/cstony0917/guard-phpcli>
