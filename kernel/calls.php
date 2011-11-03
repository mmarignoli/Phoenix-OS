<?php
//include all files for kernel
require_once('file_operation.php');

function add_command($command, $command_function)
{
	global $command_list;
	$command_list[$command] = $command_function;
	return true;
}
function exec_command($command,$arg)
{
	global $command_list;
	return $command_list[$command]($arg);
}
?>
