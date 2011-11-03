var high_index = 10;
function calculate_offset(tag)
{
	offsetX = parseInt(document.getElementById(tag).style.left) - event.clientX;
	offsetY = parseInt(document.getElementById(tag).style.top) - event.clientY;
	focus_window(tag);
}
function draggingStuff(tag)
{
	document.getElementById(tag).style.left = (event.clientX + offsetX) + 'px';
	document.getElementById(tag).style.top = (event.clientY + offsetY) + 'px';
}
function focus_window(tag)
{
	high_index += 1;
	document.getElementById(tag).style.zIndex=high_index;
}
function init()
{
	document.getElementById('drg_.*').addEventListener('dragstart', calculate_offset, false);
	document.getElementById('drg_.*').addEventListener('drag', draggingStuff, false);
}
window.onload = function(){
		init();
}
