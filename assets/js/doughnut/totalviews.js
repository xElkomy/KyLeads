$(document).ready(function(){
	var ctx = $("#totalviews").get(0).getContext("2d");
	
	var data = [
		{
			value: 20,
			color: "#F4A775",
			highlight: "#A0C2BB",
			label: "Views"
		},
	];

	var chart = new Chart(ctx).Doughnut(data);
});