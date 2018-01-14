<!DOCTYPE html>
<div>
		<canvas id="quizstarts" width="150" height="150"></canvas>
		<p id = "sStats">0%</p>
		<p><h6 id ="startCounts">0</h6> Start/s</p>
		<script type="text/javascript">
			var urldata = "<?php echo base_url(); ?>api/quizreport?id="+"<?php echo $id?>";
		</script>
		<script type="text/javascript" src="./assets/js/doughnut/quizstarts.js">
			
		</script>
</div>
