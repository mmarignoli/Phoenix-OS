<?php
//////////////////////////////////////////////////////////////////////////////////////
//In this file there will be included all the main functions to get the system running
//////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////
//Function used to include scripts
//////////////////////////////////
function add_script($name, $file)
{
	global $scripts_included;
	$scripts_included[$name] = "<script type='text/javascript' src='".site_url.$file."'></script>\n";
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//this function will add all the scripts to the html page, this should be included on the header.php file
/////////////////////////////////////////////////////////////////////////////////////////////////////////
function include_scripts()
{
	global $scripts_included;
	foreach ($scripts_included as $value)
	{
		echo $value;
	}
}
///////////////////////////////////////
//Function used to include style sheets
///////////////////////////////////////
function add_style($name, $file)
{
	global $styles_included;
	$styles_included[$name] = "<link rel=\"stylesheet\" type=\"text/css\" href=\"".site_url.$file."\"/>\n";
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//this function will add all the styles to the html page, this should be included on the header.php file
/////////////////////////////////////////////////////////////////////////////////////////////////////////
function include_styles()
{
	global $styles_included;
	foreach ($styles_included as $value)
	{
		echo $value;
	}
}

function add_application($name, $function)
{
	global $applications;
	$applications[$name] = $function;
}
function exec_application($name, $args)
{
	global $applications;
	return $applications[$name]($args);
}

function ajaxurl()
{
	$return_string = '<script type=\'text/javascript\'>';
	$return_string .= "var ajaxurl = '".site_url."/inc/ajax.php'";
	$return_string .= "</script>\n";
	echo $return_string;
}
?>
