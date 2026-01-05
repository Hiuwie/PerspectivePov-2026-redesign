<?php

if (!defined('ABSPATH')){
    exit;
}

function soft_file_actions(){
	global $error, $l;

	$return = array();

	$action = soft_optREQ('request');

	if(empty($action)){
		$return['error'] = $l['no_req_post'];
		echo json_encode($return);
		die();
	}

	if($action == 'put'){
		$filename = urldecode(soft_optREQ('filename'));
		$putdata = base64_decode(soft_optREQ('putdata'));

		$func_response = soft_put($filename, $putdata);

		if($func_response){
			$return['done'] = 'done';
		}else{
			$return['error'] = $l['err_exec'];
		}

		echo json_encode($return);
		die();
	}

	$str_args = urldecode(soft_optREQ('args'));
	$args = explode(',', $str_args);

	if(function_exists('soft_'.$action)){
		if(!empty($args)){
			if(count($args) > 1){
				$func_response = call_user_func_array('soft_'.$action, $args);
			}else{
				$func_response = call_user_func('soft_'.$action, $str_args);
			}
		}else{
			$func_response = call_user_func('soft_'.$action);
		}
		$return['func_response'] = $func_response;

		if($func_response){
			$return['done'] = $l['done'];
		}else{
			$return['error'] = $l['err_exec'];
		}

	}else{
		$return['error'] = $l['func_not_found'];
	}

	echo json_encode($return);

}
