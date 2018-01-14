<!DOCTYPE html>
<div>
		<canvas id="totalviews" width="150" height="150"></canvas>
		<p id = "vStats">0%</p>
		<p><h6 id ="viewsCount">0</h6> View/s</p>
		<script type="text/javascript">
			var urldata = "<?php echo base_url(); ?>/api/quizreport?id="+"<?php echo $id?>";
		</script>
		<script type="text/javascript" src="./assets/js/doughnut/totalviews.js">
			
		</script>
</div>