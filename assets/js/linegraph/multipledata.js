

window.onload = function () {

	executeReport();

	function executeReport(){
		$.ajax({
			type: "GET",
			url: baseUrl+"api/getprojectreports?id="+id+"&order_by_date=true",
			dataType: "json",
			success: function(result){
				var data = JSON.parse(JSON.stringify(result));
				createReport(data['quizData']);
			}
		});
	}

	function createReport(items){
			// var ndatatoDisplay = [];
			// var startDate = from;
			// var endDate = to;
			// var dateMove = new Date(startDate);
			// var strDate = startDate;
			
			// for(var i in items){
			// 	var strDate = dateMove.toISOString().slice(0,10);
			// 	ndatatoDisplay.push({
			// 		x : new Date(dateMove.getFullYear(),dateMove.getMonth(),dateMove.getDate()),
			// 		y : Number(items[i].rate),
			// 	});
			// 	dateMove.setDate(dateMove.getDate()+1);
			// }
		for(var i in items){
			console.log(items[i].daily_conversion_rate);
		}
		display();
	}

	function display(){
		var chart = new CanvasJS.Chart("chartContainer", {
			title:{
				text: "Weekly Revenue Analysis for First Quarter"
			},
			axisY:[{
				title: "Conversion rate",
				lineColor: "#C24642",
				tickColor: "#C24642",
				labelFontColor: "#C24642",
				titleFontColor: "#C24642",
			}],
			
			toolTip: {
				shared: true
			},
			legend: {
				cursor: "pointer",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "line",
				name: "Quiz 1",
				color: "#369EAD",
				showInLegend: true,
				axisYIndex: 1,
				dataPoints: [
					{ x: new Date(2018, 00, 7), y: 85.4 }, 
					{ x: new Date(2018, 00, 14), y: 60 },
					{ x: new Date(2018, 00, 21), y: 64.9 },
					{ x: new Date(2018, 00, 28), y: 58.0 },
					{ x: new Date(2018, 01, 4), y: 63.4 },
					{ x: new Date(2018, 01, 11), y: 69.9 },
					{ x: new Date(2018, 01, 18), y: 88.9 },
					{ x: new Date(2018, 01, 25), y: 66.3 },
					{ x: new Date(2018, 02, 4), y: 82.7 },
					{ x: new Date(2018, 02, 11), y: 60.2 },
					{ x: new Date(2018, 02, 18), y: 87.3 },
					{ x: new Date(2018, 02, 25), y: 60 }
				]
			},
			{
				type: "line",
				name: "Quiz 2",
				color: "#C24642",
				axisYIndex: 0,
				showInLegend: true,
				dataPoints: [
					{ x: new Date(2018, 00, 7), y: 32.3 }, 
					{ x: new Date(2018, 00, 14), y: 33.9 },
					{ x: new Date(2018, 00, 21), y: 26.0 },
					{ x: new Date(2018, 00, 28), y: 15.8 },
					{ x: new Date(2018, 01, 4), y: 18.6 },
					{ x: new Date(2018, 01, 11), y: 34.6 },
					{ x: new Date(2018, 01, 18), y: 37.7 },
					{ x: new Date(2018, 01, 25), y: 24.7 },
					{ x: new Date(2018, 02, 4), y: 35.9 },
					{ x: new Date(2018, 02, 11), y: 12.8 },
					{ x: new Date(2018, 02, 18), y: 38.1 },
					{ x: new Date(2018, 02, 25), y: 42.4 }
				]
			},
			{
				type: "line",
				name: "Quiz 3",
				color: "#7F6084",
				axisYType: "secondary",
				showInLegend: true,
				dataPoints: [
					{ x: new Date(2018, 00, 7), y: 42.5 }, 
					{ x: new Date(2018, 00, 14), y: 44.3 },
					{ x: new Date(2018, 00, 21), y: 28.7 },
					{ x: new Date(2018, 00, 28), y: 22.5 },
					{ x: new Date(2018, 01, 4), y: 25.6 },
					{ x: new Date(2018, 01, 11), y: 45.7 },
					{ x: new Date(2018, 01, 18), y: 54.6 },
					{ x: new Date(2018, 01, 25), y: 32.0 },
					{ x: new Date(2018, 02, 4), y: 43.9 },
					{ x: new Date(2018, 02, 11), y: 26.4 },
					{ x: new Date(2018, 02, 18), y: 40.3 },
					{ x: new Date(2018, 02, 25), y: 54.2 }
				]
			}]
		});
		chart.render();		
	}
	

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}