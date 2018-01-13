<!DOCTYPE html>
<div>
		<canvas id="totalviews" width="150" height="150"></canvas>
		<h6 id="holder"></h6>
		<script type="text/javascript">
			var urldata = "<?php echo base_url(); ?>/api/quizreport?id="+"<?php echo $id?>";
		</script>
		<script type="text/javascript" src="./assets/js/doughnut/totalviews.js">
			
		</script>
</div>