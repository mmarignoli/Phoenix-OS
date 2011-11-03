<?php
function ls($dir)
{
	$path = root_path . $dir;
	$file_list = scandir($path);
	$file_type = array();
	//sets a secondary array with information about the files
	//0 = is a directory
	//1 = is a file
	//2 = is a symbolic link
	for ($i = 0; $i < sizeof($file_list); $i++)
	{
		if (is_dir($path . '/' . $file_list[$i]))
		{
			$file_type[$i] = 0;
		}
		else if (is_file($path . '/' . $file_list[$i]))
		{
			$file_type[$i] = 1;
		}
		else
		{
			$file_type[$i] = 2;
		}
	}
	//prepares an array for javascript, with structure of filetype, then filename
	//$return_array = array();
	$return_array = 'new Array(';
	$comma = '';
	$array_pos = 0;
	for ($i = 0; $i < sizeof($file_list); $i++)
	{
		$return_array .= $comma;
		$return_array .= '"' . $file_type[$i] . '"';
		$comma = ',';
		$return_array .= $comma;
		$return_array .= '"' . $file_list[$i] . '"';
	}
	$return_array .= ')';
	return $return_array;
}
add_command('ls', 'ls');

function cd($args)
{
	$path = root_path . $args;
	if (is_dir($path))
	{
		echo '1';
	}
	else
	{
		echo '0';
	}
}
add_command('cd', 'cd');

function ph_mkdir($args)
{
	$path = root_path . $args;
	if(mkdir($path, 0777)){echo '1';}
	else {echo '0';}
}
add_command('mkdir', 'ph_mkdir');

function ph_rmdir($args)
{
	$path = root_path . $args;
	if(rmdir($path)){echo '1';}
	else {echo '0';}
}
add_command('rmdir', 'ph_rmdir');

function ph_mkfile($args)
{
	$path = root_path . $args;
	$makefile = fopen($path, 'w') or die("0");
	fclose($makefile);
	return true;
}
add_command('mkfile', 'ph_mkfile');

function ph_rm($args)
{
	$path = root_path . $args;
	if(unlink($path)){echo '1';}
	else{echo'0';}
}
add_command('rm', 'ph_rm');

/*function ph_cp($args)
{
	$paths = explode(" ", $args);
	if(paths[0][0] == '/')
	{
		
	}
}*/
?>
