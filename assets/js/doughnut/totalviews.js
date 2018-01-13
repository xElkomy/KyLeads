$(document).ready(function(){


	var ctx = $("#totalviews").get(0).getContext("2d");
	var datareports;
	
	$.ajax({
		type: "GET",
		url: urldata,
		dataType: "json",
		success: function(result)
		{
			var data = JSON.parse(JSON.stringify(result));
			createReport(data.views);
			// alert("data here"+urldata);
		}
		
	});
	function createReport(totalviews){
		var data = [
			{
				value: totalviews,
				color: "#F4A775",
				highlight: "#A0C2BB",
				label: "Views"
			},
		];
		var chart = new Chart(ctx).Doughnut(data);
	}
	
	
	
});