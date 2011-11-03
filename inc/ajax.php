<?php
require_once('../kernel/calls.php');
require_once('../config.php');
$type = (isset($_REQUEST['type']))? $_REQUEST['type'] : '';
$call = (isset($_REQUEST['command']))? $_REQUEST['command'] : '';
$arg = (isset($_REQUEST['arg']))? $_REQUEST['arg'] : 0;

if($type = 'exec')
{
	$return = exec_command($call,$arg);
	echo $return;
}
else if($type = 'startup')
{
	$return = '/home/'.user_name;
	echo $return;
}
?>