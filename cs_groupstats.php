<?php
/* This file is part of the wp-championship plugin for wordpress */

/*  Copyright 2012-2015  Hans Matzen  (email : webmaster at tuxlog.de)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
// if called directly, get parameters from GET and output the forecast html
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
	die("This file may not be called directly.");
}

function tooltip_groupstats() {
	include("globals.php");
	global $wpdb,$wpcs_demo;

	$groupid  = (isset($_GET['groupid'])?esc_attr($_GET['groupid']):"");
	$args=array();
	$out = "";

	// initialisiere ausgabe variable
	$out = "";

	// pruefe ob anwender angemeldet ist, wenn nicht gebe hinweis aus
	// und beende die funktion
	if ( !is_user_logged_in() and $wpcs_demo <=0){
		$out .= __("Sie sind nicht angemeldet.","wpcs")."<br />";
		$out .= __("Um am Tippspiel teilzunehmen benötigen Sie ein Konto auf dieser Website","wpcs")."<br />";
		echo $out;
		exit;
	}


	//
	// lese alternative bezeichnungen
	//
	$fieldnames = array ("cs_label_group", "cs_col_group", "cs_label_icon1", "cs_col_icon1", "cs_label_match",
			"cs_col_match", "cs_label_icon2", "cs_col_icon2", "cs_label_location", "cs_col_location",
			"cs_label_time", "cs_col_time", "cs_label_tip", "cs_col_tip", "cs_label_points",
			"cs_col_points", "cs_label_place", "cs_col_place", "cs_label_player", "cs_col_player",
			"cs_label_upoints", "cs_col_upoints", "cs_label_trend", "cs_col_trend", "cs_label_steam",
			"cs_col_steam", "cs_label_smatch", "cs_col_smatch", "cs_label_swin", "cs_col_swin",
			"cs_label_stie", "cs_col_stie", "cs_label_sloose", "cs_col_sloose", "cs_label_sgoal",
			"cs_col_sgoal", "cs_label_spoint", "cs_col_spoint", "cs_tipp_sort");

	foreach ($fieldnames as $fn)
		eval("\$$fn = get_option(\"$fn\");");
	if ($cs_label_place=="")  $cs_label_place   = __("Platz","wpcs");
	if ($cs_label_player=="") $cs_label_player  = __("Spieler","wpcs");
	if ($cs_label_upoints=="")$cs_label_upoints = __("Punktestand","wpcs");
	if ($cs_label_trend=="")  $cs_label_trend   = __("Trend","wpcs");

	if ($cs_label_steam=="")  $cs_label_steam = __("Mannschaft","wpcs");
	if ($cs_label_smatch=="") $cs_label_smatch= __("Spiele","wpcs");
	if ($cs_label_swin==""  ) $cs_label_swin  = __("Siege","wpcs");
	if ($cs_label_stie==""  ) $cs_label_stie  = __("Unentschieden","wpcs");
	if ($cs_label_sloose=="") $cs_label_sloose= __("Niederlagen","wpcs");
	if ($cs_label_sgoal=="" ) $cs_label_sgoal = __("Tore","wpcs");
	if ($cs_label_spoint=="") $cs_label_spoint= __("Punkte","wpcs");


	// ausgabe der gruppen tabelle
	// -------------------------------------------------------------------

	// Spielübersicht Vorrunde
	if (file_exists(  get_stylesheet_directory() . '/wp-championship/icons/' )){
		$iconpath = get_stylesheet_directory_uri() . '/wp-championship/icons/';
	} else {
		$iconpath = plugins_url( 'icons/' , __FILE__ );
	}

	// tabellen loop
	// hole tabellen daten
	$results = cs_get_team_clification($groupid);

	$groupid_old = "";

	//$out .= "<h2 id='cs_sh_v' class='cs_stathead' >".__("Vorrunde","wpcs")."</h2>\n";
	//$out .= "<script type='text/javascript'>jQuery('#cs_sh_v').toggle( function () { jQuery(this).addClass('divclose'); }, function () { jQuery(this).removeClass('divclose');});</script>";

	$out .= "<div id='cs_stattab_v'>";

	foreach($results as $res) {

		// bei gruppenwechsel footer / header ausgeben
		if ($res->groupid != $groupid_old) {
			if ($groupid_old !="")
				$out .= '</table><p>&nbsp;</p>';
			 
			 
			$out .= "<h2 id='cs_sh_$res->groupid' class='cs_grouphead' >".__("Gruppe","wpcs")." ".$res->groupid."</h2>\n";

			//$out .= "<script type='text/javascript'>jQuery('#cs_sh_$res->groupid').toggle( function () { jQuery(this).addClass('divclose'); }, function () { jQuery(this).removeClass('divclose');});</script>";
			$out .= "<table id='cs_stattab_$res->groupid' class='tablesorter' ><thead><tr>\n";
			if (!$cs_col_steam)   $out .= '<th style="text-align: center">'.$cs_label_steam."</th>"."\n";
			if (!$cs_col_smatch)  $out .= '<th style="text-align: center">'.$cs_label_smatch.'</th>'."\n";
			if (!$cs_col_swin)    $out .= '<th style="text-align: center">'.$cs_label_swin.'</th>'."\n";
			if (!$cs_col_stie)    $out .= '<th style="text-align: center">'.$cs_label_stie.'</th>'."\n";
			if (!$cs_col_sloose)  $out .= '<th style="text-align: center">'.$cs_label_sloose.'</th>'."\n";
			if (!$cs_col_sgoal)   $out .= '<th style="text-align: center">'.$cs_label_sgoal.'</th>'."\n";
			if (!$cs_col_spoint)  $out .= '<th style="text-align:center">'.$cs_label_spoint.'</th></tr>';
			$out .= '</thead>'."\n";
		}
		 
		// hole statistiken des teams
		$stats=array();
		$stats=cs_get_team_stats($res->tid);
		 
		// zeile ausgeben
		$out .= "<tr>";
		if (!$cs_col_steam) {
			$out .= "<td><img class='csicon' alt='icon1' width='20' src='".$iconpath . $res->icon."' />";
			$out .= $res->name . "</td>";
		}
		if (!$cs_col_smatch) $out .= "<td style='text-align:center'>".$stats['spiele']."</td>";
		if (!$cs_col_swin)   $out .= "<td style='text-align:center'>".$stats['siege']."</td>";
		if (!$cs_col_stie)   $out .= "<td style='text-align:center'>".$stats['unentschieden']."</td>";
		if (!$cs_col_sloose) $out .= "<td style='text-align:center'>".$stats['niederlagen']."</td>";
		if (!$cs_col_sgoal)  $out .= "<td style='text-align:center'> ".$res->store." : " .$res->sgegentore." </td>";
		if (!$cs_col_spoint) $out .= "<td style='text-align:center'>" . $res->spoints." </td>";
		$out .= "</tr>\n";
		 
		// gruppenwechsel versorgen
		$groupid_old = $res->groupid;
	}
	$out .= "</table><p>&nbsp;</p></div>\n";

	echo $out;
	wp_die();
}
add_action( 'wp_ajax_tooltip_groupstats', 'tooltip_groupstats' );
?>