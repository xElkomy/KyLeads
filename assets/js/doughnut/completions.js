$(document).ready(function(){
	var ctx = $("#completions").get(0).getContext("2d");
	
	executeCompletions();

	function executeCompletions(){
		$.ajax({
			type: "GET",
			url: baseUrl+"api/quizreport?id="+id+"&start="+from+"&end="+to,
			dataType: "json",
			success: function(result)
			{
				var data = JSON.parse(JSON.stringify(result));
				createReport(data.views,data.completions);
				
				var percentage = (data.completions / data.views) * 100;
				document.getElementById("comStats").innerHTML = roundToTwo(percentage)+"%";
				document.getElementById("comCounts").innerHTML = data.completions;
			}
			
		});
	}

	

	function roundToTwo(num) {    
		return +(Math.round(num + "e+2")  + "e-2");
	}
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