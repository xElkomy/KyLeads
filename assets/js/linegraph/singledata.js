
  window.onload = function () {


		function executeSingleReport(){
			$.ajax({
				type: "GET",
				url: baseUrl+'api/quizreport?id='+id+"&start="+from+"&end="+to,
				dataType: "json",
				success: function(result){
					var data = JSON.parse(JSON.stringify(result));
					createReport(data['daily_conversion_rate']);
				}
			});
		}
		 
		function createReport(items){
			
			var ndatatoDisplay = [];
			var startDate = from;
			var endDate = to;
			var dateMove = new Date(startDate);
			var strDate = startDate;
			
			for(var i in items){
				var strDate = dateMove.toISOString().slice(0,10);
				ndatatoDisplay.push({
					x : new Date(dateMove.getFullYear(),dateMove.getMonth(),dateMove.getDate()),
					y : Number(items[i].rate),
				});
				dateMove.setDate(dateMove.getDate()+1);
			}
			var newchart = new CanvasJS.Chart("chartContainer",
			{
			axisY:[{
				title: "Coversion rate",
				titleFontColor: "black	",
			}],
			axisX:[{
				title: "Date coverage",
				titleFontColor: "black	",
			}],
				data: [{        
					type: "line",
					dataPoints: ndatatoDisplay
				}       	
				]
			});
			newchart.render();
		}

		var defaultData = [];
		var startDate = from;
		var endDate = to;
		var dateMove = new Date(startDate);
		var strDate = startDate;

		$("home").ready(function(){
			executeSingleReport();
		});

		while (strDate < endDate){
			var strDate = dateMove.toISOString().slice(0,10);
			defaultData.push({
				x : new Date(dateMove.getFullYear(),dateMove.getMonth(),dateMove.getDate()),
				y : 0,
			});
			dateMove.setDate(dateMove.getDate()+1);
			
		};
		var chart = new CanvasJS.Chart("chartContainer",
		{
			axisY:[{
				title: "Coversion rate",
				titleFontColor: "black	",
			}],
			axisX:[{
				title: "Date coverage",
				titleFontColor: "black	",
			}],
		data: [{        
			type: "line",
			dataPoints: defaultData,
		}       
			
		]
		});

		chart.render();
  }
