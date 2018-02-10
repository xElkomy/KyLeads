
function link(choiceidx,outcomeidx){
    // href="<?php echo base_url('quiz/link_outcome/'.$question->auth_token.'/'. $choice->auth_token).'/'.$outcome->auth_token; ?>"
    var Datareceive = [];
    Datareceive.push({
                question : Questiondata.auth_token,
                choice : Choicesdata[choiceidx].auth_token,
                outcome : Outcomesdata[outcomeidx].auth_token,
    });
    var url = baseUrl + "quiz/link_outcome";
    Data = JSON.stringify(Datareceive[0]);
            $.post(url, {results: Data, }).done(function(data) {
                //  alert("start quiz");
            });
}
