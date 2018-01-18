$(document).ready(function()
{
    $.ajax({
		type: "GET",
		url: baseUrl+"api/mydatareports",
		dataType: "json",
		success: function(result)
		{
			var data = JSON.parse(JSON.stringify(result));
			createReport(data['results']['quiz']);	
		}
    });
    
    function createReport(data){
        var idx=0;
       for(var i in data){
           idx++;   
           document.getElementById("conversionrateid"+idx).innerHTML = roundToTwo((data[i].contacts/data[i].views)*100) + " %";
           document.getElementById("contactsid"+idx).innerHTML = data[i].contacts;
       }
    }
    function roundToTwo(num) {    
		return +(Math.round(num + "e+2")  + "e-2");
	}
});
