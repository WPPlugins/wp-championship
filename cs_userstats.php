<?php
/* This file is part of the wp-championship plugin for wordpress */

/*  Copyright 2008-2011  Hans Matzen  (email : webmaster at tuxlog.de)

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
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You 
are not allowed to call this page directly.'); }


// -----------------------------------------------------------------------------------
// Funktion zur ausgabe der User Statistikseite
// -----------------------------------------------------------------------------------
if( ! function_exists('show_UserStats') ) {//make it pluggable
	function show_UserStats($atts)
	{
		include("globals.php");
		global $wpdb,$wpcs_demo;
		
		// initialisiere ausgabe variable
		$out = "";
		
		// pruefe ob anwender angemeldet ist, wenn nicht gebe hinweis aus
		// und beende die funktion
		if ( !is_user_logged_in() and $wpcs_demo <=0){
		$out .= __("Sie sind nicht angemeldet.","wpcs")."<br />";
		$out .= __("Um am Tippspiel teilzunehmen benötigen Sie ein Konto auf dieser Website","wpcs")."<br />";
		return $out;
		}
		
		// parameter holen dabei übersteuert tippgruppe, tippgroup
		$tippgroup = (isset($atts['tippgroup'])?$atts['tippgroup']:"");	
		$tippgroup = (isset($atts['tippgruppe'])?$atts['tippgruppe']:"");	
		
		// for debugging
		//$wpdb->show_errors(true);
		
		// javascript für floating link ausgeben
		$cs_floating_link = get_option("cs_floating_link");
		if ($cs_floating_link > 0 )
		  $out .= cs_get_float_js();
		
		
		// lese anwenderdaten ein
		$userdata = wp_get_current_user();
		// merke die userid 
		$uid = $userdata->ID;
		
		// userdaten lesen
		$sql0="select * from $cs_users where userid=$uid";
		$r0= $wpdb->get_results($sql0);
		
		// admin flag setzen
		$is_admin=false;
		if ( $r0[0]->admin == 1 ) 
		$is_admin=true;
		
		// ermittle aktuelle uhrzeit
		$currtime=date("Y-m-d H:i:s");
		
		// begruessung ausgeben
		$out .= __("Willkommen ","wpcs").$userdata->display_name .",<br />";
		$out .= __("auf dieser Seite siehst du den aktuellen Stand des Turniers und des Tippspiels.","wpcs")."<br /></p>";
		
		
		//
		// ausgabe des floating nach oben links
		//
		if ($cs_floating_link > 0 )
		 $out .= '<div id="WPCSfloatMenu" ><ul class="menu1"><li><a href="#" onclick="window.scrollTo(0,0); return false;"> Nach oben </a></li></ul></div>';
		
		
		
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
		
		
		// ausgabe der optionen und der tipptabelle
		// -------------------------------------------------------------------
		
		
		// anzeigen wenn der user admin des tippspiels ist
		if ( $is_admin ) 
		$out .= '<b>'.__("Du bist Tippspiel-Administrator.","wpcs").'</b><br />';
		
		
		// anzeigen der gewinnermannschaft falls tunier schon beendet
		$cswinner = cs_get_cswinner();
		if ( $cswinner ) 
		$out.= "<hr>".__("Der Gewinner des Turniers heißt:","wpcs")."<b>$cswinner</b><hr>";
		
		// ausgabe des aktuellen punktestandes und des ranges
		$rank = cs_get_ranking($tippgroup);
		$out .= "<h2>".__("Aktueller Punktestand","wpcs")."</h2>\n";
		$out .= "<table class='tablesorter'><tr>\n";
		if (!$cs_col_place) 
		 $out .= '<th scope="col" style="text-align: center">'.$cs_label_place .'</th>'."\n";
		if (!$cs_col_player)
		 $out .= '<th scope="col" style="text-align: center">'.$cs_label_player.'</th>'."\n";
		if (!$cs_col_upoints)
		 $out .= '<th style="width:20;text-align: center">'.$cs_label_upoints.'</th>';
		if (get_option('cs_rank_trend'))
		 $out .= '<th style="width:20;text-align: center">'.$cs_label_trend.'</th>';
		$out .= "</tr>\n";
		
		
		$pointsbefore= -1;   
		$i=0; $j=1;
		foreach ($rank as $row) {
		// platzierung erhoehen, wenn punkte sich veraendern
		if ($row->points != $pointsbefore) {
		 $i = $i + $j;
		 $j=1;
		} else
		 $j += 1;
		
		if ($i < $row->oldrank or $row->oldrank==-1 )
		   $trend = "&uArr;";
		elseif ($i > $row->oldrank )
		   $trend = "&dArr;";
		else
		   $trend = "&rArr;"; 
		
		$out .= "<tr>";
		
		if (!$cs_col_place)   $out .= "<td style='text-align:center'>$i</td>";
		if (!$cs_col_player)  $out .= "<td style='text-align:center'>".$row->user_nicename."</td>";
		if (!$cs_col_upoints) $out .= "<td style='text-align:center'>".$row->points. "</td>";
		
		if (get_option('cs_rank_trend'))
		   $out .= "<td style='text-align:center'>$trend</td>";
		$out .= "</tr>";
		
		// gruppenwechsel versorgen
		$pointsbefore = $row->points;
		}
		$out .= '</table>'."<p>&nbsp;</p>\n";
		
		// Übersicht Strafpunkte ausgeben
		$penalties = cs_get_team_penalty();
		if (is_array($penalties) && sizeof($penalties)>0) {
			$out .= "<div id='cs_stattab_p'>";
			$out .= "<h2>".__("Strafpunkte","wpcs")."</h2>\n";
		
			foreach($penalties as $k => $val ) {
				$out .= $val->name . ":   " . $val->penalty . " $cs_label_spoint<br/>";
		}
			$out .="<br/></div>";
		}
		
		// Spielübersicht Vorrunde
		if (file_exists(  get_stylesheet_directory() . '/wp-championship/icons/' )){
			$iconpath = get_stylesheet_directory_uri() . '/wp-championship/icons/';
		} else {
			$iconpath = plugins_url( 'icons/' , __FILE__ );
		}
		
		// tabellen loop
		// hole tabellen daten
		$results = cs_get_team_clification();
		
		$groupid_old = "";
		
		$out .= "<h2 id='cs_sh_v' class='cs_stathead' onclick=\"jQuery(document).ready( function() {jQuery('#cs_stattab_v').toggle('slow') } );\">".__("Vorrunde","wpcs")."</h2>\n"; 
		$out .= "<script type='text/javascript'>jQuery('#cs_sh_v').toggle( function () { jQuery(this).addClass('divclose'); }, function () { jQuery(this).removeClass('divclose');});</script>";
		
		$out .= "<div id='cs_stattab_v'>";
		
		foreach($results as $res) {
		
		// bei gruppenwechsel footer / header ausgeben
		if ($res->groupid != $groupid_old) {
		 if ($groupid_old !="")
		 $out .= '</table><p>&nbsp;</p>';
		 
		 
		 $out .= "<h2 id='cs_sh_$res->groupid' class='cs_grouphead' onclick=\"jQuery(document).ready( function() {jQuery('#cs_stattab_$res->groupid').toggle('slow'   , function() { if ( jQuery('#cs_stattab_$res->groupid').css('display') == 'block') jQuery('#cs_stattab_$res->groupid').css('display','table');}    ); } );\">".__("Gruppe","wpcs")." ".$res->groupid."</h2>\n"; 
		
		 $out .= "<script type='text/javascript'>jQuery('#cs_sh_$res->groupid').toggle( function () { jQuery(this).addClass('divclose'); }, function () { jQuery(this).removeClass('divclose');});</script>";
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
		
		
		// Finalrunde ausgeben
		$sql1=<<<EOD
		select a.mid as mid, b.icon as icon1, b.name as name1,
		c.icon as icon2, c.name as name2, a.result1 as result1,
		a.result2 as result2, a.location as location, 
		date_format(a.matchtime,'%d.%m<br />%H:%i') as matchtime,
		a.matchtime as origtime,  
		a.matchtime as matchts
		from  $cs_match a
		inner join  $cs_team b
		on a.tid1=b.tid
		inner join  $cs_team c
		on a.tid2=c.tid
		where a.round='F'
		 order by origtime;
EOD;
		
		$results = $wpdb->get_results($sql1);
		
		// tabellen kopf ausgeben
		if (!empty($results)) {
		 $out .= "<h2 id='cs_sh_z' class='cs_stathead' onclick=\"jQuery(document).ready( function() {jQuery('#cs_stattab_z').toggle('slow', function() { if ( jQuery('#cs_stattab_z').css('display') == 'block') jQuery('#cs_stattab_z').css('display','table');}    ); } );\">".__("Finalrunde","wpcs")."</h2>\n"; 
		 $out .= "<script type='text/javascript'>jQuery('#cs_sh_z').toggle( function () { jQuery(this).addClass('divclose'); }, function () { jQuery(this).removeClass('divclose');});</script>";
		 
		 $out .= "<table id='cs_stattab_z' class='tablesorter'><thead><tr>\n";
		 $out .= '<th style="width:20">'.__("Spielnr.","wpcs").'</th>'."\n";
		 $out .= '<th>&nbsp;</th>';
		 $out .= '<th scope="col" style="text-align: center">'.__('Begegnung',"wpcs")."</th>"."\n";
		 $out .= '<th>&nbsp;</th>';
		 $out .= '<th scope="col" style="text-align: center">'.__('Ort',"wpcs").'</th>'."\n";
		 $out .= '<th scope="col" style="text-align: center">'.__("Datum<br />Zeit").'</th>'."\n";
		 $out .= '<th style="text-align:center">'.__("Ergebnis","wpcs").'</th>';
		 $out .= '</tr></thead>'."\n";
		 }
		
		foreach($results as $res) {
		// zeile ausgeben
		$out .= "<tr>";
		$out .= "<td style='text-align:center'>".$res->mid."</td>";
		if ($res->icon1 != "")
		 $out .= "<td><img class='csicon' alt='icon1' width='15' src='".$iconpath.$res->icon1."' /></td>";
		else
		 $out .= "<td>&nbsp;</td>";
		$out .= "<td style='text-align:center'>".cs_team2text($res->name1) . " - " . cs_team2text($res->name2)."</td>";
		if ($res->icon2 != "")
		 $out .= "<td><img class='csicon' alt='icon2' width='15' src='".$iconpath.$res->icon2."' /></td>";
		else
		 $out .= "<td>&nbsp;</td>";
		$out .= "<td style='text-align:center'>".$res->location."</td>";
		$out .= "<td style='text-align:center'>".$res->matchtime."</td>";
		$out .= "<td style='text-align:center'>";
		$out .= ( $res->result1==-1 ? "-" : $res->result1) ." : ". ($res->result2==-1?"-":$res->result2) . "</td>";
		$out .= "</tr>\n";
		
		}
		if (!empty($results)) 
		 $out .= "</table>\n<p>&nbsp;";
		
		
		return $out;
	}
}//make it pluggable

?>