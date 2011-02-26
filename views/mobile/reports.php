<div class="report_list">
	<div class="block">
		<?php
		if ($category AND $category->loaded)
		{
			$category_id = $category->id;
			$color_css = 'class="swatch" style="background-color:#'.$category->category_color.'"';
			echo '<h2 class="other"><a href="#"><div '.$color_css.'></div>'.$category->category_title.'</a></h2>';
		}
		else
		{
			$category_id = "";
		}
		?>
		<div class="other filter">
			<form action=<?php echo url::site() . '/mobile/reports/search' ?> method="get" accept-charset="utf-8">
				<label for="town">Your town</label>
				<input type="text" name="town" value="<?php echo isset($_GET['town']) ? $_GET['town'] : ''; ?>">
				<label for="distance">Distance</label>
				<select name="distance" id="distance">
					<?php
					$distance_options = array('0.5', '1', '2', '3', '7', '10', '20');
					$selected_distance = isset($_GET['distance']) ? $_GET['distance'] : '0.5';
					foreach($distance_options as $option){
						echo '<option value="' . $option . '"';
						echo $option == $selected_distance ? 'selected' : '';
						echo '>' . $option . ' km</option>';
					}
					?>
				</select>
				<label for="category">Category</label>
				<select name="category" id="category">
					<option value="0">all</option>
					<option value="la">la</option>
					<option value="li">li</option>
				</select>
				<label for="order">Order By</label>
				<select name="order" id="order">
					<?php
					$order_options = array('distance', 'date', 'verified');
					$selected_distance = isset($_GET['order']) ? $_GET['order'] : 'distance';
					foreach($order_options as $option){
						echo '<option value="' . $option . '"';
						echo $option == $selected_distance ? 'selected' : '';
						echo '>' . $option . '</option>';
					}
					?>
				</select>
				<input type="submit" value="Search &rarr;">
			</form>
		</div>
		<div class="list">
			<ul>
				<?php
				if ($have_results && $incidents->count())
				{
					$page_no = (isset($_GET['page'])) ? $_GET['page'] : "";
					foreach ($incidents as $incident)
					{
						$incident_date = $incident->incident_date;
						$incident_date = date('M j Y', strtotime($incident->incident_date));
						$location_name = $incident->location_name;
						echo '<li><span class="verified ';
						if ($incident->incident_verified == 1)
						{
							echo "verified_yes";
						}
						echo '">Verified</span>';
						echo "<strong><a href=\"".url::site()."mobile/reports/view/".$incident->id."?c=".$category_id."&p=".$page_no."\">".$incident->incident_title."</a></strong>";
						echo "&nbsp;&nbsp;<i>$incident_date</i>";
						echo "<BR /><span class=\"location_name\">".$location_name."</span></li>";
					}
				}
				else
				{
					echo "<li>No Reports Found</li>";
				}
				?>
			</ul>
		</div>
		<?php if ($have_results) { echo $pagination; } ?>
	</div>
</div>