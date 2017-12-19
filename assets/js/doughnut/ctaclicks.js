$(document).ready(function(){
	var ctx = $("#ctaclicks").get(0).getContext("2d");

	var data = [
		{
			value: 270,
			color: "#C02942",
			highlight: "lightskyblue",
			label: "Data1"
		},
		{
			value: 150,
			color: "#542437",
			highlight: "yellowgreen",
			label: "Data2"
		},
		{
			value: 10,
			color: "#53777A",
			highlight: "darkorange",
			label: "Data3"
		}
	];

	var chart = new Chart(ctx).Doughnut(data);
});