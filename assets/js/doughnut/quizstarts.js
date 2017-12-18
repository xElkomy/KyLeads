$(document).ready(function(){
	var ctx = $("#quizstarts").get(0).getContext("2d");

	var data = [
		{
			value: 270,
			color: "#9BC53D",
			highlight: "lightskyblue",
			label: "Data1"
		},
		{
			value: 50,
			color: "#FDE74C",
			highlight: "yellowgreen",
			label: "Data2"
		},
		{
			value: 120,
			color: "#5BC0EB",
			highlight: "darkorange",
			label: "Data3"
		}
	];

	var chart = new Chart(ctx).Doughnut(data);
});