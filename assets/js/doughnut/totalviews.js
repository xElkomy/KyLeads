$(document).ready(function(){
	var ctx = $("#totalviews").get(0).getContext("2d");

	var data = [
		{
			value: 270,
			color: "#F4A775",
			highlight: "#A0C2BB",
			label: "Data1"
		},
		{
			value: 0,
			color: "#F4C667",
			highlight: "#2274A5",
			label: "Data2"
		},
		{
			value: 0,
			color: "#F37361",
			highlight: "#3D1308",
			label: "Data3"
		}
	];

	var chart = new Chart(ctx).Doughnut(data);
});