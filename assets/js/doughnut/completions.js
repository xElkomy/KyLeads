$(document).ready(function(){
	var ctx = $("#completions").get(0).getContext("2d");

	var data = [
		{
			value: 70,
			color: "cornflowerblue",
			highlight: "lightskyblue",
			label: "Data1"
		},
		{
			value: 200,
			color: "lightgreen",
			highlight: "yellowgreen",
			label: "Data2"
		},
	];

	var chart = new Chart(ctx).Doughnut(data);
});