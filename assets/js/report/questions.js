$(document).ready(function(){
		
	$("question").ready(function() {

		executeQuestions();
		
		function executeQuestions(){
			for (var i in questions) {
				var targetid = "questiontarget"+i;
				createReport(questions[i],targetid,i);
			}
		}

		
		
		function createReport(question,target,i){
			$.ajax({
				type: "GET",
				url: baseUrl+"api/quizreport?id="+id+"&questionid="+question+"&start="+from+"&end="+to,
				dataType: "json",
				success: function(result)
				{
					
					var data = JSON.parse(JSON.stringify(result));
					document.getElementById(target).innerHTML = data.results + "     ("+roundToTwo((data.results/data.completes)*100)+"%)";
					createanswerReport(data.answers,i,data.results);
				}
			});
		}

		function createanswerReport(answers,i,resultcount){
			
			var idx = Number(i)+1;
				for(var item in answers){
					var choicetarget = item+"of"+(Number(i)+1);
					document.getElementById(choicetarget).innerHTML = answers[item]+ "     ("+roundToTwo((answers[item]/resultcount)*100)+"%)" ;
				}
		}
		function roundToTwo(num) {    
			return +(Math.round(num + "e+2")  + "e-2");
		}
		
	});
	
});