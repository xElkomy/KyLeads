$(document).ready(function(){
		
	$("outcome").ready(function() {

		executeOutcomes();
		function executeOutcomes(){
			for (var i in outcomes) {
				var targetid = "outcometarget"+i;
				createReport(outcomes[i],targetid);
			}
		}
		
		function createReport(outcome,target){
			$.ajax({
				type: "GET",
				url: baseUrl+"api/quizreport?id="+id+"&outcomeid="+outcome+"&start="+from+"&end="+to,
				dataType: "json",
				success: function(result)
				{
					var data = JSON.parse(JSON.stringify(result));
					document.getElementById(target).innerHTML = data.results + "     ("+roundToTwo((data.results/data.completes)*100)+"%)";
				}
			});
		}
		function roundToTwo(num) {    
			return +(Math.round(num + "e+2")  + "e-2");
		}
	});
	
});