# Simple PHP Unit Test

## Usage

include the main file
```php
include('../simple-php-unit-test/simple-php-unit-test.php');

function a_function_to_be_test ( $input){
	if($input === 'hello'){
		return ture;
	}else{
		return false;
	}
}


describe('a_function_to_be_test input hello should be true', function(){
	expect_true(a_function_to_be_test('hello'));
	// expect_true(false);
});


describe('a_function_to_be_test input not hello should be false', function(){
	expect_false(a_function_to_be_test('yppppppppp'));
});
```

Then run

```
php sample-test.php
```

Output

![](http://i.imgur.com/UfyO4u4.png)

# Others

You can work with this

<https://github.com/cstony0917/guard-phpcli>
