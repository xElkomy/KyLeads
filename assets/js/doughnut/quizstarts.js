$(document).ready(function(){
	var ctx = $("#quizstarts").get(0).getContext("2d");
	var views = 270;
	var data = [
		{
			value: views,
			color: "#9BC53D",
			highlight: "lightskyblue",
			label: "Views"
		},
		{
			value: 50,
			color: "#FDE74C",
			highlight: "yellowgreen",
			label: "Start"
		},
	];

	var chart = new Chart(ctx).Doughnut(data);
});