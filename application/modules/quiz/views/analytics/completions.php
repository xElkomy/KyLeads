<!DOCTYPE html>
<div>
	<canvas id="completions" width="150" height="150"></canvas>
	<p id ="comStats">0</p>
	
	<p><h6 id ="comCounts">0</h6> Complete/s</p>
	<script type="text/javascript">
			var urldata = "<?php echo base_url(); ?>/api/quizreport?id="+"<?php echo $id?>";
	</script>
	<script type="text/javascript" src="./assets/js/doughnut/completions.js">
			
	</script>
</div>
