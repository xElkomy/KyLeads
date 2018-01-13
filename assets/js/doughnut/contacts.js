$(document).ready(function(){
	var ctx = $("#contacts").get(0).getContext("2d");

	$.ajax({
		type: "GET",
		url: urldata,
		dataType: "json",
		success: function(result)
		{
			var data = JSON.parse(JSON.stringify(result));
			createReport(data.views,data.contacts);
			// alert("data here"+urldata);
		}
		
	});

	function createReport(totalviews,totalcontacts){

		var data = [
			{
				value: totalviews,
				color: "#9BC53D",
				highlight: "lightskyblue",
				label: "Views"
			},
			{
				value: totalcontacts,
				color: "#FDE74C",
				highlight: "yellowgreen",
				label: "Contacts"
			},
		];
	
		var chart = new Chart(ctx).Doughnut(data);
	}
});