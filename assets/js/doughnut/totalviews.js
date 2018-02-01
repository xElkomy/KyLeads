$(document).ready(function(){


	var ctx = $("#totalviews").get(0).getContext("2d");
	var datareports;
	
	executeViews();

	function executeViews(){
		$.ajax({
			type: "GET",
			url: baseUrl+"api/quizreport?id="+id+"&start="+from+"&end="+to,
			dataType: "json",
			success: function(result)
			{
				var data = JSON.parse(JSON.stringify(result));
				createReport(data.views);
				var percentage = (data.views / data.views) * 100;	
				document.getElementById("vStats").innerHTML = roundToTwo(percentage)+"%";
				document.getElementById("viewStats1").innerHTML = roundToTwo(percentage)+"%";
				document.getElementById("viewsCount").innerHTML = data.views;
				document.getElementById("viewCount1").innerHTML = data.views;
			}
			
		});
	}
	

	function roundToTwo(num) {    
		return +(Math.round(num + "e+2")  + "e-2");
	}

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