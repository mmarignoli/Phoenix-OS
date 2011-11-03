<?php
add_style('terminal', 'plugins/terminal/css/terminal.css');
add_script('terminal', 'plugins/terminal/js/terminal.js');
function terminal()
{
	echo'<div id="terminal_screen"></div>
<div id="terminal_line"><div id="terminal_prefix"> $&nbsp;</div><div id="command_div"><input type="text" id="command" class="terminal_input" onkeypress="on_enter(event);"></div></div>';
}
add_application('terminal', 'terminal');
?>

