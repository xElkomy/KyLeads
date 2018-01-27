$(document).ready(function()
{
   
    $.ajax({
		type: "GET",
		url: baseUrl+"api/getprojectreports",
		dataType: "json",
		success: function(result)
		{
			var data = JSON.parse(JSON.stringify(result));
            createReport(data['results']);
           
		}
    });
    
    function createReport(data){
        var idx=0;
       for(var i in data){
           idx++;
          
           document.getElementById("conversionrateid"+idx).innerHTML = roundToTwo((data[i]['reports'].contacts/data[i]['reports'].views)*100) + " %";
           document.getElementById("contactsid"+idx).innerHTML = data[i]['reports'].contacts;
       }
    }
    function roundToTwo(num) {
        if (isNaN(num)) {
            return 0;
        } 
		return +(Math.round(num + "e+2")  + "e-2");
	}
});
