$(document).ready(function(){
	var ctx = $("#completions").get(0).getContext("2d");

	$.ajax({
		type: "GET",
		url: urldata,
		dataType: "json",
		success: function(result)
		{
			var data = JSON.parse(JSON.stringify(result));
			createReport(data.views,data.completions);
			// alert("data here"+urldata);
		}
		
	});

	function createReport(totalviews,totalcompletions){

		var data = [
			{
				value: totalviews,
				color: "#9BC53D",
				highlight: "lightskyblue",
				label: "Views"
			},
			{
				value: totalcompletions,
				color: "#FDE74C",
				highlight: "yellowgreen",
				label: "Completions"
			},
		];
	
		var chart = new Chart(ctx).Doughnut(data);
	}
});