<?php

function dbg()
{
	$args = func_get_args();
	echo sep();
	foreach($args as $k => $arg) {
		echo '#' . ($k + 1) . sep();
		echo pre();
		var_dump($arg);
		echo pre() . sep();
	}
}

function _dbg()
{
	$args = func_get_args();
	call_user_func_array('dbg', $args);
	die();
}

function dbgm($o = null)
{
	dbg(get_class_methods(class_name));
}

function _dbgm($o = null)
{
	dbgm($o);
	die();
}

function pre($closeTag = false)
{
	if(php_sapi_name() == 'cli') {
		return;
	}

	if($closeTag) {
		return '</pre>';
	}

	return '<pre>';
}

function sep()
{
	if(php_sapi_name() == 'cli') {
		return "\n";
	}

	return '<br>';
}
