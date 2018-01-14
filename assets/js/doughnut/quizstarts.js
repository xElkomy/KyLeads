$(document).ready(function(){
	var ctx = $("#quizstarts").get(0).getContext("2d");
	

	$.ajax({
		type: "GET",
		url: urldata,
		dataType: "json",
		success: function(result)
		{
			var data = JSON.parse(JSON.stringify(result));
			createReport(data.views,data.starts);
			// sStats
			var percentage = (data.starts / data.views) * 100;	
			document.getElementById("sStats").innerHTML = roundToTwo(percentage)+"%";
			document.getElementById("startCounts").innerHTML = data.starts;
			// alert("data here"+urldata);
		}
		
	});

	function roundToTwo(num) {    
		return +(Math.round(num + "e+2")  + "e-2");
	}

	function createReport(totalviews,totalstarts){

		var data = [
			{
				value: totalviews,
				color: "#9BC53D",
				highlight: "lightskyblue",
				label: "Views"
			},
			{
				value: totalstarts,
				color: "#FDE74C",
				highlight: "yellowgreen",
				label: "Starts"
			},
		];
	
		var chart = new Chart(ctx).Doughnut(data);
	}
	
});