$(document).ready(function(){
	var ctx = $("#contacts").get(0).getContext("2d");

	var data = [
		{
			value: 270,
			color: "#F77F00",
			highlight: "lightskyblue",
			label: "Data1"
		},
		{
			value: 90,
			color: "#FCBF49",
			highlight: "yellowgreen",
			label: "Data2"
		},
	];

	var chart = new Chart(ctx).Doughnut(data);
});