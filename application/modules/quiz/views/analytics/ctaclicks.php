<!DOCTYPE html>
<div>
	<canvas id="ctaclicks" width="150" height="150"></canvas>
	<p id="ctaStats">0%</p>
	<p><h6 id ="ctaCounts">0</h6> Click/s</p>
	<script type="text/javascript">
		var urldata = "<?php echo base_url(); ?>api/quizreport?id="+"<?php echo $id?>";
	</script>
	<script type="text/javascript" src="./assets/js/doughnut/ctaclicks.js">
			
	</script>
</div>
