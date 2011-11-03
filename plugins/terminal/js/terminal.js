var active_path = '';
function on_enter(e)
{
        // look for window.event in case event isn't passed in
        if (window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            command = $(".terminal_input").val();  
            cmd = command.split(" ");
            $("#terminal_screen").append(cmd[0]);
            $("#terminal_screen").append(command.substring(cmd[0].length) + '<br>');
            $(".terminal_input").val('');
            eval('term_' + cmd[0])(command.substring(cmd[0].length +1));
        }
}
function ajax_ls(path)
{
	var values;
	$.post(ajaxurl, {type:'exec', command:'ls', arg:path},function(response) {
		values = eval(response);
		for (i=0; i < values.length; i++)
		{
			if(values[i] == 0)
			{
				i++;
				$("#terminal_screen").append(values[i] + '<br>');
			}
			else if(values[i] == 1)
			{
				i++;
				$("#terminal_screen").append('<span style="color: blue;">' + values[i] + '</span><br>');
			}
		}
	});
}
function term_ls(args)
{
	if(args == '')
	{
		args = active_path;
	}
	var values;
	$.post(ajaxurl, {type:'exec', command:'ls', arg:args},function(response) {
		values = eval(response);
		for (i=0; i < values.length; i++)
		{
			if(values[i] == 0)
			{
				i++;
				$("#terminal_screen").append(values[i] + '<br>');
			}
			else if(values[i] == 1)
			{
				i++;
				$("#terminal_screen").append('<span style="color: blue;">' + values[i] + '</span><br>');
			}
		}
	});
}
function term_cd(args)
{
	if(args == '')
	{}
	else if(args[0] == '/')
	{
		path = args;
		$.post(ajaxurl, {type: 'exec', command:'cd', arg:path}, function(response){
			if(response == 1)
			{
				active_path = path;
				$('#terminal_prefix').html(active_path + ' $&nbsp;');
			}
			else
			{
				$("#terminal_screen").append(args + ' is not a directory');
			}
		});
	}
	else if(args[0] == '.' && args[1] == '.')
	{
		path = active_path.split("/");
		active_path = '';
		for(i=1;i < path.length-1; i++)
		{
			active_path = active_path + '/' + path[i];
		}
		$('#terminal_prefix').html(active_path + ' $&nbsp;');
	}
	else if(args[0] == '.')
	{}
	else
	{
		path = active_path + '/' + args;
		$.post(ajaxurl, {type: 'exec', command:'cd', arg:path}, function(response){
			if(response == 1)
			{
				active_path = path;
				$('#terminal_prefix').html(active_path + ' $&nbsp;');
			}
			else
			{
				$("#terminal_screen").append(args + ' is not a directory');
			}
		});
	}
}

function term_mkdir(args)
{
	if(args[0] == '/')
	{
		path = args;
		$.post(ajaxurl, {type: 'exec', command:'mkdir', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot create directory<br>');
			}
		});
	}
	else{
		path = active_path + '/' + args;
		$.post(ajaxurl, {type: 'exec', command:'mkdir', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot create directory<br>');
			}
		});
	}
}

function term_rmdir(args)
{
	if(args[0] == '/')
	{
		path = args;
		$.post(ajaxurl, {type: 'exec', command:'rmdir', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot delete directory<br>');
			}
		});
	}
	else{
		path = active_path + '/' + args;
		$.post(ajaxurl, {type: 'exec', command:'rmdir', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot delete directory<br>');
			}
		});
	}
}

function term_mkfile(args)
{
	if(args[0] == '/')
	{
		path = args;
		$.post(ajaxurl, {type: 'exec', command:'mkfile', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot create file<br>');
			}
		});
	}
	else{
		path = active_path + '/' + args;
		$.post(ajaxurl, {type: 'exec', command:'mkfile', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot create file<br>');
			}
		});
	}
}
function term_rm(args)
{
	if(args[0] == '/')
	{
		path = args;
		$.post(ajaxurl, {type: 'exec', command:'rm', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot delete file<br>');
			}
		});
	}
	else{
		path = active_path + '/' + args;
		$.post(ajaxurl, {type: 'exec', command:'rm', arg:path}, function(response){
			if(response == 1)
				{}
			else
			{
				$("#terminal_screen").append('Cannot delete file<br>');
			}
		});
	}
}