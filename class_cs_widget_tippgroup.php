<?php

if ( !class_exists('cs_widget_tippgroup') )
{
	class cs_widget_tippgroup extends WP_Widget
	{
		function __construct()
		{
			$widget_ops = array('classname' => 'cs_widget_tippgroup',
					'description' => 'WP Championship Tippgruppen Widget');
			$control_ops = array('width' => 300, 'height' => 150);
			parent::__construct('wp-championship-tippgroup', 'WP Championship Tippgruppen', $widget_ops, $control_ops);
		}

		function widget( $args, $instance )
		{
			include ( plugin_dir_path( __FILE__ ) . 'globals.php');
			global $wpdb;
			extract($args);
			 
			$title = apply_filters('widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title']);
			$showAverage = empty($instance['showAverage']) ? 'no' : $instance['showAverage'];
			$showAmountUsers = empty($instance['showAmountUsers']) ? 'yes' : $instance['showAmountUsers'];
			$AmountGroups = empty($instance['AmountGroups']) ? '5' : $instance['AmountGroups'];
			$showFullRanking = empty($instance['showFullRanking']) ? 'no' : $instance['showFullRanking'];
			$FullRankingURL = empty($instance['FullRankingURL']) ? 'www.yoursite.com' : $instance['FullRankingURL'];
			$FullRankingURLTitle = empty($instance['FullRankingURLTitle']) ? 'more' : $instance['FullRankingURLTitle'];

			echo $before_widget;
			if ( $title )
				echo $before_title . $title . $after_title;

			//Query User and Points
			$limit = $AmountGroups;
			$res = cs_get_tippgroup_ranking();

			if (!empty($res)) {
				//Table Head
				echo "<table  class='widgettable'>";
				echo "<tr>";
				echo "<td>&nbsp;</td>";
				echo "<td align='left' >".__("N","wpcs")."</td>";
				echo "<td align='center'>P</td>";
				if($showAverage == '1') {
					echo "<td align='center'>&Oslash;</td>";
				}
				if($showAmountUsers == '1') {
					echo "<td align='center'>T</td>";
				}
				echo "</tr>";

				//Table Content
				$pointsbefore= -1;
				$i=0; $j=1;
				$k=0;
				foreach ($res as $row) {
					if ($k >= $limit) break;
					if ($row->points != $pointsbefore) {
		    			$i = $i + $j;
		    			$j=1;
					} else
		    			$j += 1;

					echo "<tr>";
					echo "<td align='left'>$i.</td>";
					echo "<td align='left'>".$row->name."</td>";
					echo "<td align='center'>".$row->points. "</td>";
					if($showAverage == '1') {
		    			echo "<td align='center'>".round($row->average,1)."</td>";
					}
					if($showAmountUsers == '1') {
		    			echo "<td align='center'>".$row->numusers."</td>";
					}
					
					// gruppenwechsel versorgen
					$pointsbefore = $row->points;
					
					// Ausgabezaehler erhoehen
					$k +=1;
				}
					
				// Table foot
				echo "</tr></table>";
				if($showFullRanking == '1' && $FullRankingURL) {
					echo '<div style="text-align:center"><a href="http://'.$FullRankingURL.'">'.$FullRankingURLTitle.'</a></div>';
				}
			} else {
				echo __("Es sind noch keine Spielergebnisse vorhanden.",'wpcs');
			}
			echo $after_widget;
			 
			 
		}



		function update( $new_instance, $old_instance )
		{
			$instance = $old_instance;

			$instance['title'] = strip_tags(stripslashes($new_instance['title']));
			$instance['showAverage'] = strip_tags(stripslashes($new_instance['showAverage']));
			$instance['showAmountUsers'] = strip_tags(stripslashes($new_instance['showAmountUsers']));
			$instance['AmountGroups'] = strip_tags(stripslashes($new_instance['AmountGroups']));
			$instance['showFullRanking'] = strip_tags(stripslashes($new_instance['showFullRanking']));
			$instance['FullRankingURL'] = strip_tags(stripslashes($new_instance['FullRankingURL']));
			$instance['FullRankingURLTitle'] = strip_tags(stripslashes($new_instance['FullRankingURLTitle']));

			return $instance;
			 
		}



		function form( $instance )
		{


			// Vorbelegung
			$defaults = array(
					'title'=>'wp-Championship Tippgruppen',
					'showAverage'=>'1',
					'showAmountUsers'=>'1',
					'AmountGroups'=>'5',
					'showFullRanking'=>'1',
					'FullRankingURL'=>'www.yoursite.com',
					'FullRankingURLTitle'=>'mehr...' ) ;
			 
			$instance = wp_parse_args( $instance, $defaults);

			$title = htmlspecialchars($instance['title']);
			$showAverage = htmlspecialchars($instance['showAverage']);
			$showAmountUsers = htmlspecialchars($instance['showAmountUsers']);
			$AmountGroups = htmlspecialchars($instance['AmountGroups']);
			$showFullRanking = htmlspecialchars($instance['showFullRanking']);
			$FullRankingURL = htmlspecialchars($instance['FullRankingURL']);
			$FullRankingURLTitle = htmlspecialchars($instance['FullRankingURLTitle']);

			//
			// Einstellungsdialog des Widgets ausgeben
			//
			?>
<p>
	<label for="<?php echo $this->get_field_id('title');?>"><?php echo __("Title","wpcs");?>:
	</label> <input id="<?php echo $this->get_field_id('title');?>"
		name="<?php echo $this->get_field_name('title');?>" type="text"
		value="<?php echo $title;?>" />
</p>
<p>
	<label for="widget_wp_championship_points-showAverage"><?php echo __("Durchschnitt anzeigen?","wpcs");?>
	</label> <input type="radio"
		name="<?php echo $this->get_field_name('showAverage');?>"
		id="<?php echo $this->get_field_name('showAverage');?>" value="1"
		<?php if($showAverage == '1') echo 'checked="checked"';?>>
	<?php echo __("Ja","wpcs");?>
	<input type="radio"
		name="<?php echo $this->get_field_name('showAverage');?>"
		id="<?php echo $this->get_field_name('showAverage');?>" value="0"
		<?php if($showAverage == '0') echo 'checked="checked"';?>>
	<?php echo __("Nein","wpcs");?>
</p>
<p>
	<label for="widget_wp_championship_points-showAmountUsers"><?php echo __("Anzahl der Tipps?","wpcs");?>
	</label> <input type="radio"
		name="<?php echo $this->get_field_name('showAmountUsers');?>"
		id="<?php echo $this->get_field_name('showAmountUsers');?>" value="1"
		<?php if($showAmountUsers == '1') echo 'checked="checked"';?>>
	<?php echo __("Ja","wpcs");?>
	<input type="radio"
		name="<?php echo $this->get_field_name('showAmountUsers');?>"
		id="<?php echo $this->get_field_name('showAmountUsers');?>" value="0"
		<?php if($showAmountUsers == '0') echo 'checked="checked"';?>>
	<?php echo __("Nein","wpcs");?>
</p>
<p>
	<label for="widget_wp_championship_points-AmountGroups"><?php echo __("Anzahl der angezeigten Tippgruppen","wpcs");?>
	</label> <input style="width: 30px;" maxlength="2" type="text"
		name="<?php echo $this->get_field_name('AmountGroups');?>"
		id="<?php echo $this->get_field_name('AmountGroups');?>"
		value="<?php echo $AmountGroups;?>" />
</p>
<p>
	<label for="widget_wp_championship_points-showFullRanking"><?php echo __("Link anzeigen?","wpcs");?>
	</label> <input type="radio"
		name="<?php echo $this->get_field_name('showFullRanking');?>"
		id="<?php echo $this->get_field_name('showFullRanking');?>" value="1"
		<?php if($showFullRanking == '1') echo 'checked="checked"';?>>
	<?php echo __("Ja","wpcs");?>
	<input type="radio"
		name="<?php echo $this->get_field_name('showFullRanking');?>"
		id="<?php echo $this->get_field_name('showFullRanking');?>" value="0"
		<?php if($showFullRanking == '0') echo 'checked="checked"';?>>
	<?php echo __("Nein","wpcs");?>
</p>
<p>
	<label for="widget_wp_championship_points-FullRankingURL"><?php echo __("Link URL","wpcs");?>
		http://</label> <input type="text"
		id="<?php echo $this->get_field_name('FullRankingURL');?>"
		name="<?php echo $this->get_field_name('FullRankingURL');?>"
		value="<?php echo $FullRankingURL;?>" />
</p>
<p>
	<label for="widget_wp_championship_points-FullRankingURLTitle"><?php echo __("Link Bezeichnung","wpcs"); ?>
	</label> <input type="text"
		id="<?php echo $this->get_field_name('FullRankingURLTitle');?>"
		name="<?php echo $this->get_field_name('FullRankingURLTitle');?>"
		value="<?php echo $FullRankingURLTitle;?>" />
</p>
<?php


		}

	} // end of class
} // endif class exists
?>