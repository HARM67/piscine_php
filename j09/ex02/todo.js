var ft_list = document.getElementById("ft_list");
var my_button = document.getElementById("my_button");
ft_list.innerHTML = getCookie("todo");
setDelete();

function setDelete()
{
	var elm = document.querySelectorAll("#ft_list div");
	for (var i = 0; i < elm.length ; i++)
	{
		elm[i].onclick = function(e)
		{
			if (confirm("Do yo really want to delete this post ?") === true)
			{
				e.path[1].removeChild(e.path[0]);
				setCookie("todo", ft_list.innerHTML, 1);
			}
		}
	}
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue.replace(/;/g, "qwertyuiop") + "; " + expires;
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	
	//console.log(typeof ca);
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0)
			return c.substring(name.length, c.length).replace(/qwertyuiop/g, ";");
	}
	return "";
}

my_button.onclick = function()
{
	var new_data = prompt();
	if (new_data === "")
		return;
	var new_elm = document.createElement("div");
	new_elm.innerHTML = new_data;
	ft_list.insertBefore(new_elm, ft_list.firstChild);
	setCookie("todo", ft_list.innerHTML, 1);
	setDelete();
}
