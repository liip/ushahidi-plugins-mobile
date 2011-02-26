<div class="block">
	<h2 class="submit"><a href="<?php echo url::site()."mobile/reports/submit/" ?>">Submit A Report</a></h2>
</div>
<div class="block">
	<h2 class="expand">Find a Report</h2>
	<div class="collapse shown">
		<?php
			echo '<form action="'.url::site().'mobile/search" method="get">';
		?>
		<form action="" method="get">
			<label for="town">Your Town</label>
				<input type="text/submit/hidden/button" name="town" value="">
				<input type="submit" value="Search &rarr;">
  		</form>
		
	</div>
</div>
<div class="block">
	<h2 class="other"><a href="<?php echo url::site()."mobile/categories/" ?>">Or search by category</a></h2>
</div>