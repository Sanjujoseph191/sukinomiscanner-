
function iAjax(url, successFunction, method, data){
	if(!method) method='GET'
	if(!data) data= null
	var page_request = false

	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject) // if IE
	{ 
		try
		{
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		}
		catch (e)
		{
			try
			{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
		return false
	
	page_request.onreadystatechange=function()
	{
		if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
		{
			successFunction(page_request.responseText)
		}
	}
	if(method=='POST')
	{
		page_request.open(method, url, true)
		page_request.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8')
		page_request.send(data)
	}
	else if (method=='GET')
	{
		if(data) url+= "?" + data
		page_request.open(method, url, true)
		page_request.send(null)
	}
}