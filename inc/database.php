<?php
mysql_connect(db_adress,db_uname,db_pass);
@mysql_select_db(db_name) or die( "Unable to select database");
//pulls all the configuration settings from database, and sets it on an array
function settings_db()
{
	global $db_sett;
	$result = mysql_query('select * FROM '.db_prefix.'configuration');
	$num_set = mysql_num_rows($result);
	for ($i = 0; $i < $num_set; $i++)
	{
		$db_sett[mysql_result($result, $i, 'name')] = mysql_result($result, $i, 'value');
	}
	return true;
}
function query($query)
{
	//$result = mysql_query($query);
	//$vals = mysql_field_name($result, 0);
	//return $vals;
}
?>
