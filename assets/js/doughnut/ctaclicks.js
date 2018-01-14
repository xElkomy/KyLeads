$(document).ready(function(){
	var ctx = $("#ctaclicks").get(0).getContext("2d");

	
	$.ajax({
		type: "GET",
		url: urldata,
		dataType: "json",
		success: function(result)
		{
			var data = JSON.parse(JSON.stringify(result));
			createReport(data.views,data.ctaclicks);
			// alert("data here"+urldata);
			var percentage  = (data.ctaclicks / data.views) * 100;
			document.getElementById("ctaStats").innerHTML = roundToTwo(percentage)+"%";
			document.getElementById("ctaCounts").innerHTML = data.ctaclicks;
		}
		
	});

	
	function roundToTwo(num) {    
		return +(Math.round(num + "e+2")  + "e-2");
	}
	function createReport(totalviews,totalclicks){

		var data = [
			{
				value: totalviews,
				color: "#9BC53D",
				highlight: "lightskyblue",
				label: "Views"
			},
			{
				value: totalclicks,
				color: "#FDE74C",
				highlight: "yellowgreen",
				label: "Clicks"
			},
		];
	
		var chart = new Chart(ctx).Doughnut(data);
	}
});