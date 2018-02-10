            
// $( document ).ready(function() {

//    var quizid =  $(".kyquiz").attr("quiz-id");
   
//    var quizUrl = "http://localhost:8084/"+"takequiz/quiz/"+quizid;
//    var iFrame='<iframe width="1000" height="600" src="'+ quizUrl+'" scrolling="no" frameborder="0" frameborder="0" allowfullscreen></iframe>';
//    $(".kyquiz" ).append(iFrame);
// });



function initquiz(){
        var script = document.createElement('script');
        script.src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js";
        document.getElementsByTagName('head')[0].appendChild(script);

        script.onload = function() {
            var quizid =  $(".kyquiz").attr("quiz-id");
            var quizUrl = "http://localhost:8084/"+"takequiz/quiz/"+quizid;
            var iFrame='<iframe width="820" height="500" src="'+ quizUrl+'" frameborder="0" allowfullscreen></iframe>';
            $(".kyquiz" ).append(iFrame);   
        };
}
window.onload = initquiz;
