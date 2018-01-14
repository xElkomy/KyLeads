<!DOCTYPE html>
<div>
	<canvas id="contacts" width="150" height="150"></canvas>
	<p id="conStats">0%</p>
	<p><h6 id ="conCounts">0</h6> Contact/s</p>
	<script type="text/javascript">
		var urldata = "<?php echo base_url(); ?>api/quizreport?id="+"<?php echo $id?>";
	</script>
	<script type="text/javascript" src="./assets/js/doughnut/contacts.js">
		
	</script>
</div>
