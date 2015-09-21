<?php
/*
	USEAGE:

	GO READ THE README.md
*/

class SimplePHPUnitTest {
	private $specs = array();

	public function describe($desc, $callback){
		$this->specs[] = array(
			'desc' => $desc,
			'callback' => $callback
		);
	}

	public function start(){
		$fails = array();
		foreach ($this->specs as $spec) {
			$is_passed = true;
			$callback = $spec['callback'];
			$desc = $spec['desc'];


			$err_msg = '';

			try{
				$callback();
			} catch(Exception $e){
				// var_dump($e);
				$err_msg = $e->getMessage();
				$is_passed = false;
			}

			if( $is_passed ){
				// echo "\033[0;32m" . 'passed' . "\033[0m";
				echo "\033[0;32m" . '.' . "\033[0m";
			}else{
				// $fails[] = $spec;
				$fails[] = array(
					'desc' => $desc,
					'msg' => $err_msg
				);

				echo "\033[1;31m" . '.' . "\033[0m";
			}
		}


		foreach ($fails as $fail) {
			echo "\n";
			echo "\033[1;31m";
			echo $fail['desc'] . ", " . $fail['msg'];
			// var_dump($fail);
			echo "\033[0m";
			echo "\n";
		}
	}
}


class expect{
	public static function true($input){
		// var_dump($input);
		if( $input !== true){

			if(gettype($input) === 'boolean'){
				$input = ($input) ? 'true' : 'false';
			}

			$err = 'expect "true" but return "' . $input . '"';
			// $err = 'expect "true" but return "false"';

			// echo "-----------------\n";
			// echo "\n" . $err . "\n";
			// echo "\n-----------------";
			// echo "\n" . $err;
			throw new Exception($err);
		}
	}
	public static function false($input){
		// var_dump($input !== false);
		if( $input !== false){

			if(gettype($input) === 'boolean'){
				$input = ($input) ? 'true' : 'false';
			}

			$err = 'expect "false" but return "' . $input . '"';
			// $err = 'expect "false" but return "true"';

			// echo "\n-----------------\n";
			// echo "\n" . $err . "\n";
			// echo "\n-----------------\n";
			// echo "\n" . $err;
			throw new Exception($err);
		}
	}
}
