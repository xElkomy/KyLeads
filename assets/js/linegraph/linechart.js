
    const CHART = document.getElementById("LineChart");
   
   
	function executeMultipleReport(){
        
		$.ajax({
			type: "GET",
			url: baseUrl+"api/getprojectreports?id="+id+"&order_by_date=true&start="+from+"&end="+to,
			dataType: "json",
			success: function(result){
				var data = JSON.parse(JSON.stringify(result));
				createReport(data['quizData']);
			}
		});
    }
    function executeSingleReport(id){
       
		$.ajax({
			type: "GET",
			url: baseUrl+"api/getprojectreports?id="+id+"&order_by_date=true&start="+from+"&end="+to,
			dataType: "json",
			success: function(result){
				var data = JSON.parse(JSON.stringify(result));
				createReport(data['quizData']);
			}
		});
	}
    function getDates(startDate, stopDate) {
        var listDate = [];
        var startDate =startDate;
        var endDate = stopDate;
        var dateMove = new Date(startDate);
        var strDate = startDate;

        while (strDate < endDate){
        var strDate = dateMove.toISOString().slice(0,10);
        listDate.push(new Date(dateMove.getFullYear(),dateMove.getMonth(),dateMove.getDate()).toLocaleDateString());
        dateMove.setDate(dateMove.getDate()+1);
        };
       
        return listDate;
    }
    function createReport(items){
        var dataArray = [];
        for(var i in items){
            var rates = [];
            for(var j in items[i].daily_conversion_rate){
                rates.push(items[i].daily_conversion_rate[j].rate);
            }
            dataArray.push({
                label: items[i].title,
                fill: false,
                lineTension: 0.1,
                backgroundColor:'rgba(75,192,192,0.4)',
                borderColor:'rgba(75,192,192,1)',
                borderCapStyle:'butt',
                borderDash:[],
                borderDashOffset:0.0,
                borderJoinStyle:'miter',
                pointBorderColor:'rgba(75,192,192,0.4)',
                pointBackgroundColor: 'rgba(75,192,192,1)',
                pointBorderWidth:10,
                pointHoverRadius:10,
                pointHoverBackgroundColor:'rgba(75,192,192,1)',
                pointHoverBorderColor:'rgba(75,192,192,0.4)',
                pointHoverBorderWidth:10,
                pointRadius:2,
                pointHitRadius:10,
                data: rates,    
            });
        }
        display(dataArray);
        
    }
    function display(dataArray){
        
        let NewLineChart = new LineChart(CHART,{
            type:'line',
            data: data = {
                labels: getDates(from,to),
                datasets: dataArray,
                },
            options: {
                legend: {
                    labels: {
                        fontColor: "black",
                        fontSize: 18
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 15,
                            max : 100,    
                            min : 0,
                            fontColor: "black",
                            callback: function(value, index, values) {
                                return value + " %";
                            }
                        },scaleLabel:{
                            display: true,
                            labelString: 'Conversion Rate',
                            fontColor: "black",
                            fontSize: 20,
                        }
                    },],
                    xAxes: [{
                        ticks: {
                            fontSize: 15,
                            fontColor: "black",
                        }
                    }]
                }
            }
        })
    }
    function executedefault(){
        let DefaultLineChart = new LineChart(CHART,{
            type:'line',
            data: data = {
                labels: getDates(from,to),
                datasets:[{
                    label:"----",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor:'rgba(75,192,192,0.4)',
                    borderColor:'rgba(75,192,192,1)',
                    borderCapStyle:'butt',
                    borderDash:[],
                    borderDashOffset:0.0,
                    borderJoinStyle:'miter',
                    pointBorderColor:'rgba(75,192,192,0.4)',
                    pointBackgroundColor:"#fff",
                    pointBorderWidth:10,
                    pointHoverRadius:10,
                    pointHoverBackgroundColor:'rgba(75,192,192,1)',
                    pointHoverBorderColor:'rgba(75,192,192,0.4)',
                    pointHoverBorderWidth:10,
                    pointRadius:2,
                    pointHitRadius:10,
                    data: 0,
                }
            ]},
            options: {
                legend: {
                    labels: {
                        fontColor: "black",
                        fontSize: 18
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontSize: 15,
                            max : 100,    
                            min : 0,
                            fontColor: "black",
                            callback: function(value, index, values) {
                                return value + " %";
                            }
                        },scaleLabel:{
                            display: true,
                            labelString: 'Conversion Rate',
                            fontColor: "black",
                            fontSize: 20,
                        }
                    },],
                    xAxes: [{
                        ticks: {
                            fontSize: 15,
                            fontColor: "black",
                        }
                    }]
                }
            }
        })
    }
        
