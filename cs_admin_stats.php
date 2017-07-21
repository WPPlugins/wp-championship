<?php
/* This file is part of the wp-championship plugin for wordpress */

/*  Copyright 2008-2014  Hans Matzen  (email : webmaster at tuxlog.de)

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

require_once("supp/supp.php");

// -----------------------------------------------------------------------------------
// Funktion zur Ausgabe der Admin Statistikseite
// -----------------------------------------------------------------------------------
if( ! function_exists('cs_admin_stats') ) {//make it pluggable
	function cs_admin_stats()
	{
		include("globals.php");
		global $wpdb;
		
		// initialisiere ausgabe variable
		$out = "";
		$out .= tl_add_supp(); 
		$out .= "<div class='wrap'>";
		
		$sql="select count(*) as anz from  $cs_match where round='V';";
		$r0=$wpdb->get_row($sql);
		$sql="select count(*) as anz from  $cs_match where round='F';";
		$r1=$wpdb->get_row($sql);
		$sql="select count(*) as anz from  $cs_match where winner<>-1;";
		$r2=$wpdb->get_row($sql);
		
		$out .= "Das Turnier besteht aus ".($r0->anz + $r1->anz) . " Spielen.<br />";
		$out .= "Davon ".$r0->anz." in der Vorrunde und ".$r1->anz." in der Finalrunde.<br />";
		$out .= "Es wurden bereits ".$r2->anz." Begegnungen entschieden. <br />";
		
		// anzeigen der gewinnermannschaft falls tunier schon beendet
		$cswinner = cs_get_cswinner();
		if ( $cswinner ) 
		$out.= "<hr>".__("Der Gewinner des Turniers heißt:","wpcs")."<b>$cswinner</b><hr>";
		
		// ausgabe des aktuellen punktestandes und des ranges
		$rank = cs_get_ranking();
		$i=0;
		$out .= "<h2>".__("Aktueller Punktestand","wpcs")."</h2>\n";
		$out .= "<table border='1' style='width:500px' ><tr>\n";
		$out .= '<th scope="col" style="text-align: center">Platz</th>'."\n";
		$out .= '<th scope="col" style="text-align: center">Spieler</th>'."\n";
		$out .= '<th style="width:20">'.__("Punktestand","wpcs").'</th>'."\n";
		$out .= '<th style="width:20">'.__("Anzahl Tipps","wpcs").'</th>'."\n";
		$out .= '<th style="width:20">'.__("Champion-Tipp","wpcs").'</th>'."</tr>\n";
		
		$i=0;
		$j=1;
		$pointsbefore= -1; 
		foreach ($rank as $row) {
		// platzierung erhoehen, wenn punkte sich veraendern
		if ($row->points != $pointsbefore) {
		 $i = $i +$j;
		 $j=1;
		} else
		 $j += 1;
		
		// ermittle anzahl abgegebener tipps
		$sql="select count(*) as anz from $cs_tipp a inner join $cs_match b on a.mid=b.mid where a.result1<>-1 and a.result2<>-1 and userid=".$row->userid.";";
		$r0=$wpdb->get_row($sql);
		
		// ermittle champion tipp
		$sql="select name from $cs_team a inner join $cs_users b on a.tid = b.champion where userid=".$row->userid.";";
		$r1=$wpdb->get_row($sql);
		
		$out .= "<tr><td style='text-align:center'>$i</td>";
		$out .= "<td style='text-align:center'>".$row->user_nicename."</td>";
		$out .= "<td style='text-align:center'>".$row->points. "</td>";
		$out .= "<td style='text-align:center'>".$r0->anz."</td>";
		$out .= "<td style='text-align:center'>".(isset($r1->name)?$r1->name:'-')."</td></tr>";
		// gruppenwechsel versorgen
		$pointsbefore = $row->points;
		}
		
		$out .= '</table>'."<p>&nbsp;</p></div>\n";
		
		
		echo $out;
	}
}//make it pluggable

?>
