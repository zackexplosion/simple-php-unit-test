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
		$start_time = microtime();
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

		echo 'time elapsed : ' . ( microtime() - $start_time / 1000 ) . ' µs';
	}
}


class _expect{
	private $input;

	public function __construct($input){
		// var_dump($input);
		$this->input = $input;
	}

	private static function to_string($boolean){
		if(gettype($boolean) === 'boolean'){
			$boolean = ($boolean) ? 'true' : 'false';
		}
		return $boolean;
	}

	public function to_equal($equal){
		$input = $this->input;
		// var_dump($equal);
		if($input !== $equal){
			$input = $this::to_string($input);

			$equal = $this::to_string($equal);

			$err = 'expect "' . $equal . '" but return "' . $input . '"';

			throw new Exception($err);
		}
	}
}

function expect($input){
	return new _expect($input);
}

