<?php
/* This file is part of the wp-championship plugin for wordpress */
/*  Copyright 2007-2014  Hans Matzen  (email : webmaster at tuxlog.de)

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
// generic functions
require_once ("functions.php");
require_once ("supp/supp.php");
//

// function to show and maintain the set of matches for the championship

//

if (!function_exists('cs_admin_match')) { //make it pluggable
	
	function cs_admin_match() {
		include ("globals.php");
		// base url for links
		$thisform = "admin.php?page=wp-championship/cs_admin_match.php";
		// get group option and define group ids
		$groupstr = "ABCDEFGHIJKLM";
		$cs_groups = get_option("cs_groups");
		// get sql object
		$wpdb = & $GLOBALS['wpdb'];
		//$wpdb->show_errors(true);
		
		// find out what we have to do
		$action = "";
		
		if (isset($_POST['submit'])) $action = "savenew";
		elseif (isset($_POST['update'])) $action = "update";
		elseif (isset($_GET['action']) && esc_attr($_GET['action']) == 'remove') $action = "remove";
		elseif (isset($_GET['action']) && esc_attr($_GET['action']) == 'modify') $action = "edit";
		// add or update match data
		
		//
		$errflag = 0;
		
		if ($action == "savenew" or $action == "update") {
			// check form contents for mandatory fields
			
			// and/or set default values
			
			if ($_POST['matchtime'] == "") $errflag = 1;
			
			if ($_POST['location'] == "") $_POST['location'] = __("nowhere", "wpcs");
			
			if (!isset($_POST['spieltag']) || $_POST['spieltag'] == "") $_POST['spieltag'] = 0;
			// send a message about mandatory data
			
			if ($errflag == 1) admin_message(__('Datum und Uhrzeit der Begegnung müssen gefüllt sein.', "wpcs"));
			// error in update form data causes to reprint the update form
			
			if ($errflag == 1 and $action == "update") $action = "edit";
			// insert new match into database
			
			if ($errflag == 0 and $action == "savenew") {
				$psql = $wpdb->prepare("insert into $cs_match values (0,'V',%d,%d,%d,'%s','%s',-1,-1,-1,-1,-1);",
				$_POST['spieltag'], $_POST['team1'], $_POST['team2'], $_POST['location'], $_POST['matchtime']);
				$results = $wpdb->query($psql);
				
				if ($results == 1) admin_message(__('Begegnung erfolgreich angelegt.', "wpcs"));
				else admin_message(__('Datenbankfehler; Vorgang abgebrochen', "wpcs"));
			}
			// update team
			
			if ($errflag == 0 and $action == "update") {
				$psql = $wpdb->prepare("update $cs_match set tid1=%d, tid2=%d, location='%s', matchtime='%s',spieltag=%d where mid=%d;", $_POST['team1'], $_POST['team2'], $_POST['location'], $_POST['matchtime'], $_POST['spieltag'], $_POST['mid']);
				$results = $wpdb->query($psql);
				
				if ($results === false) admin_message(__('Datenbankfehler; Vorgang abgebrochen', "wpcs"));
				else admin_message(__('Begegnung erfolgreich gespeichert.', "wpcs"));
				
			}
		}
		// remove data from database
		
		if ($action == 'remove') {
			$sql = "delete from " . $cs_match . " where mid=" . intval($_GET['mid']) . ";";
			$results = $wpdb->query($sql);
			
			if ($results == 1) admin_message(__('Begegnung gelöscht.', "wpcs"));
			else admin_message(__('Datenbankfehler; Vorgang abgebrochen', "wpcs"));
		}
		// output teams add/modify form
		
		if ($action == 'edit') {
			// select data to modify
			$sql = "select * from $cs_match where mid=" . intval($_GET['mid']) . ";";
			$results = $wpdb->get_row($sql);
		}
		//
		
		// build form ==========================================================
		
		//
		$out = "";
		$team1_select_html = "";
		$team2_select_html = "";
		$sql = "select tid,name from $cs_team where name not like '#%'order by name;";
		$results1 = $wpdb->get_results($sql);
		
		foreach ($results1 as $res) {
			$team1_select_html.= "<option value='" . $res->tid . "' ";
			
			if (isset($results->tid1) && $res->tid == $results->tid1) $team1_select_html.= "selected='selected'";
			$team1_select_html.= ">" . $res->name . "</option>\n";
			$team2_select_html.= "<option value='" . $res->tid . "' ";
			
			if (isset($results->tid2) && $res->tid == $results->tid2) $team2_select_html.= "selected='selected'";
			$team2_select_html.= ">" . $res->name . "</option>\n";
		}
		// select header for update or add match
		
		if ($action == 'edit') {
			$out.= '<div class="wrap"><h2>' . __('Begegnung ändern', "wpcs") . '</h2><div id="ajax-response"></div>' . "\n";
			$out.= tl_add_supp();
			$out.= '<form name="modifymatch" id="modifymatch" method="post" action="#"><input type="hidden" name="action" value="modifymatch" /><input type="hidden" name="mid" value="' . $results->mid . '" />' . "\n";
		}
		else {
			$out.= '<div class="wrap"><h2>' . __('Begegnung hinzufügen', "wpcs") . '</h2><div id="ajax-response"></div>' . "\n";
			$out.= tl_add_supp();
			$out.= '<form name="addmatch" id="addmatch" method="post" action="#"><input type="hidden" name="action" value="addmatch" />' . "\n";
		}
		$out.= '<table class="editform" style="width:100%"><tr>';
		$out.= '<th style="width:33%" scope="row" ><label for="team1">' . __('Mannschaft 1 ', "wpcs") . ':</label></th>' . "\n";
		$out.= '<td style="width:67%"><select id="team1" name="team1">' . $team1_select_html . '</select></td></tr>' . "\n";
		$out.= '<tr><th scope="row" ><label for="team2">' . __('Mannschaft 2', "wpcs") . ' :</label></th>' . "\n";
		$out.= '<td><select id="team2" name="team2">' . $team2_select_html . '</select></td></tr>' . "\n";
		$out.= '<tr><th scope="row" ><label for="location">' . __('Ort', 'wpcs') . ':</label></th>' . "\n";
		$out.= '<td><input name="location" id="location" type="text" value="' . (isset($results->location) ? $results->location : "") . '" size="40" /></td></tr>' . "\n";
		$out.= '<tr><th scope="row" ><label for="matchtime">' . __('Datum / Zeit', 'wpcs') . ':</label></th>' . "\n";
		$out.= '<td><input name="matchtime" id="matchtime" type="text" value="' . (isset($results->matchtime) ? $results->matchtime : "") . '" size="40" /></td></tr>' . "\n";
		// spieltag ausgeben wenn in liga-modus
		
		if (get_option('cs_modus') == 2) {
			$out.= '<tr><th scope="row"><label for="spieltag">' . __('Spieltag', 'wpcs') . ':</label></th>' . "\n";
			$out.= '<td><input name="spieltag" id="spieltag" type="text" value="' . (isset($results->spieltag) and $results->spieltag == - 1 ? "-" : $results->spieltag) . '" size="3" /></td></tr>' . "\n";
		}
		$out.= '</table>' . "\n";
		// add submit button to form
		
		if ($action == 'edit') $out.= '<p class="submit"><input type="submit" name="update" value="' . __('Begegnung speichern', 'wpcs') . ' &raquo;" /></p></form></div>' . "\n";
		else $out.= '<p class="submit"><input type="submit" name="submit" value="' . __('Begegnung hinzufügen', 'wpcs') . ' &raquo;" /></p></form></div>' . "\n";
		echo $out;
		//
		
		// output match table
		
		//
		$out = "";
		$out = "<div class=\"wrap\">";
		$out.= "<h2>" . __("Matches", "wpcs") . "</h2>\n";
		$out.= "<table class=\"widefat\"><thead><tr>\n";
		$out.= '<th scope="col" style="text-align: center">ID</th>' . "\n";
		$out.= '<th scope="col">' . __('Mannschaft 1', "wpcs") . "</th>" . "\n";
		$out.= '<th scope="col">' . __("Mannschaft 2", "wpcs") . '</th>' . "\n";
		$out.= '<th scope="col" style="width:90px;text-align: center">' . __('Ort', "wpcs") . '</th>' . "\n";
		$out.= '<th scope="col" style="width:90px;text-align: center">' . __('Datum / Zeit', "wpcs") . '</th>' . "\n";
		
		if (get_option('cs_modus') == 2) $out.= '<th scope="col" style="width:10px;text-align: center">' . __('Spieltag', "wpcs") . '</th>' . "\n";
		$out.= '<th style="text-align: center">' . __('Aktion', "wpcs") . '</th></tr></thead>' . "\n";
		// match loop
		$sql = "select a.mid as mid,b.name as team1,c.name as team2,a.location as location,a.matchtime as matchtime, a.spieltag as spieltag from $cs_match a inner join $cs_team b on a.tid1=b.tid inner join $cs_team c on a.tid2=c.tid where a.round='V' order by mid;";
		$results = $wpdb->get_results($sql);
		
		foreach ($results as $res) {
			$out.= "<tr><td style='text-align:center'>" . $res->mid . "</td><td>" . $res->team1 . "</td>";
			$out.= "<td>" . $res->team2 . "</td><td style='text-align:center'>" . $res->location . "</td>";
			$out.= "<td style='text-align:center'>" . $res->matchtime . "</td>";
			
			if (get_option('cs_modus') == 2) $out.= "<td style='text-align:center'>" . ($res->spieltag == - 1 ? "-" : $res->spieltag) . "</td>";
			$out.= "<td style='text-align:center'><a href=\"" . $thisform . "&amp;action=modify&amp;mid=" . $res->mid . "\">" . __("Ändern", "wpcs") . "</a>&nbsp;&nbsp;&nbsp;";
			$out.= "<a href=\"" . $thisform . "&amp;action=remove&amp;mid=" . $res->mid . "\">" . __("Löschen", "wpcs") . "</a></td></tr>\n";
		}
		$out.= '</table></div>' . "\n";
		echo $out;
	}
} //make it pluggable

?>