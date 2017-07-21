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

// function to show and maintain the set of teams for the championship

//

if (!function_exists('cs_admin_team')) { //make it pluggable
	
	function cs_admin_team() {
		include ("globals.php");
		// base url for links
		$thisform = "admin.php?page=wp-championship/cs_admin_team.php";
		// get group option and define group ids
		$groupstr = "ABCDEFGHIJKLM";
		$cs_groups = get_option("cs_groups");
		// get sql object
		$wpdb = & $GLOBALS['wpdb'];
		$wpdb->show_errors(true);
		// find out what we have to do
		$action = "";
		
		if (isset($_POST['submit'])) $action = "savenew";
		elseif (isset($_POST['update'])) $action = "update";
		elseif (isset($_GET['action']) && esc_attr($_GET['action']) == 'remove') $action = "remove";
		elseif (isset($_GET['action']) && esc_attr($_GET['action']) == 'modify') $action = "edit";
		// add or update team data
		
		//
		$errflag = 0;
		
		if ($action == "savenew" or $action == "update") {
			// check form contents for mandatory fields
			
			// and/or set default values
			
			if ($_POST['team_name'] == "") $errflag = 1;
			else 
			if (substr($_POST['team_name'], 0, 1) == "#") $errflag = 2;
			
			if ($_POST['team_icon'] == "") $_POST['team_icon'] = "default.png";
			
			if ($_POST['qualified'] == "") $_POST['qualified'] = 0;
			
			if ($_POST['penalty'] == "") $_POST['penalty'] = 0;
			// send a message about mandatory data
			
			if ($errflag == 1) admin_message(__('Der Name der Mannschaft darf nicht leer sein.', "wpcs"));
			
			if ($errflag == 2) admin_message(__('Der Name der Mannschaft darf nicht mit # beginnen.', "wpcs"));
			// error in update form data causes to reprint the update form
			
			if ($errflag > 0 and $action == "update") $action = "edit";
			// insert new team into database
			
			if ($errflag == 0 and $action == "savenew") {
				$psql = $wpdb->prepare("insert into $cs_team values (0,'%s', '%s', '%s','%s', %d, %d);", $_POST['team_name'], $_POST['team_shortname'], $_POST['team_icon'], $_POST['group'], $_POST['qualified'], $_POST['penalty']);
				//$sql = "insert into ". $cs_team ." values (0,'" . $_POST['team_name'] . "','" . $_POST['team_shortname'] . "','" . $_POST['team_icon'] . "','" . $_POST['group'] . "'," . $_POST['qualified'] . "," . $_POST['penalty'] .");";
				$results = $wpdb->query($psql);
				
				if ($results == 1) admin_message(__('Mannschaft erfolgreich angelegt.', "wpcs"));
				else admin_message(__('Datenbankfehler; Vorgang abgebrochen', "wpcs"));
			}
			// update team
			
			if ($errflag == 0 and $action == "update") {
				$psql = $wpdb->prepare("update $cs_team set name='%s', shortname='%s', icon='%s',groupid='%s',qualified=%d, penalty=%d where tid=%d;",
				$_POST['team_name'], $_POST['team_shortname'], $_POST['team_icon'], $_POST['group'], $_POST['qualified'], $_POST['penalty'], $_POST['tid']);
				//$sql = "update ".$cs_team." set name='" . $_POST['team_name'] . "', shortname='" . $_POST['team_shortname'] . "', icon='" . $_POST['team_icon'] . "',groupid='" . $_POST['group'] . "',qualified=" . $_POST['qualified'] . ", penalty=" . $_POST['penalty'] . " where tid=".$_POST['tid'].";";
				$results = $wpdb->query($psql);
				
				if ($results == 1) admin_message(__('Mannschaft erfolgreich gespeichert.', "wpcs"));
				else admin_message(__('Datenbankfehler; Vorgang abgebrochen', "wpcs"));
			}
		}
		// remove data from database
		
		if ($action == 'remove') {
			$psql = $wpdb->prepare("delete from $cs_team where tid=%d;", $_GET['tid']);
			//$sql= "delete from ".$cs_team." where tid=".$_GET['tid'].";";
			$results = $wpdb->query($psql);
			
			if ($results == 1) admin_message(__('Mannschaft gelöscht.', "wpcs"));
			else admin_message(__('Datenbankfehler; Vorgang abgebrochen', "wpcs"));
		}
		// output teams add/modify form
		$resed = array(
			'name' => "",
			'shortname' => "",
			'icon' => "",
			'groupid' => "",
			'qualified' => "",
			'penalty' => 0
		);
		
		if ($action == 'edit') {
			// select data to modify
			$sql = "select * from  $cs_team where tid=" . esc_attr($_GET['tid']) . ";";
			$resed = $wpdb->get_row($sql, ARRAY_A);
		}
		//
		
		// build form ==========================================================
		
		//
		$out = "";
		// select header for update or add team
		
		if ($action == 'edit') {
			$out.= '<div class="wrap"><h2>' . __('Mannschaft ändern', "wpcs") . '</h2><div id="ajax-response"></div>' . "\n";
			$out.= tl_add_supp();
			$out.= '<form name="modifyteam" id="modifyteam" method="post" action="#"><input type="hidden" name="action" value="modifyteam" /><input type="hidden" name="tid" value="' . $resed['tid'] . '" />' . "\n";
		}
		else {
			$out.= '<div class="wrap"><h2>' . __('Mannschaft hinzufügen', "wpcs") . '</h2><div id="ajax-response"></div>' . "\n";
			$out.= tl_add_supp();
			$out.= '<form name="addteam" id="addteam" method="post" action="#"><input type="hidden" name="action" value="addteam" />' . "\n";
		}
		$out.= '<table class="editform" style="width:100%"><tr>';
		$out.= '<th style="width:33%" scope="row" ><label for="team_name">' . __('Name', "wpcs") . ':</label></th>' . "\n";
		$out.= '<td style="width:67%"><input name="team_name" id="team_name" type="text" value="' . $resed['name'] . '" size="40" onblur="calc_shortname();" /></td></tr>' . "\n";
		$out.= '<th style="width:33%" scope="row" ><label for="team_shortname">' . __('Shortname', "wpcs") . ':</label></th>' . "\n";
		$out.= '<td style="width:67%"><input name="team_shortname" id="team_shortname" type="text" value="' . $resed['shortname'] . '" size="5" maxlength="5" /></td></tr>' . "\n";
		$out.= '<tr><th scope="row" ><label for="team_icon">' . __('Symbol / Wappen', "wpcs") . ' :</label></th>' . "\n";
		$out.= '<td><input name="team_icon" id="team_icon" type="text" value="' . $resed['icon'] . '" size="40" /></td></tr>' . "\n";
		$out.= '<tr><th scope="row" ><label for="group">' . __('Gruppe', 'wpcs') . ':</label></th>' . "\n";
		$out.= '<td><select name="group" id="group" class="postform">' . "\n";
		// build group selection box
		
		for ($i = 0;$i < $cs_groups;$i++) {
			$charone = substr($groupstr, $i, 1);
			$out.= '<option value="' . $charone . '"';
			
			if ($charone == $resed['groupid']) $out.= ' selected="selected"';
			$out.= '>' . $charone . '</option>';
		}
		$out.= '</select></td>	</tr>';
		$out.= '<tr><th scope="row" ><label for="qualified">' . __('Platzierung der Vorrunde', 'wpcs') . ':</label></th>' . "\n";
		$sql = "select count(*) as anz from $cs_team where groupid='" . $resed['groupid'] . "';";
		$res1 = $wpdb->get_row($sql);
		$out.= '<td><select name="qualified" id="qualified" class="postform">' . "\n";
		// build qualified selection box
		
		for ($i = 0;$i <= $res1->anz;$i++) {
			$out.= '<option value="' . $i . '"';
			
			if ($i == $resed['qualified']) $out.= ' selected="selected"';
			$out.= '>' . $i . '</option>';
		}
		$out.= '</select></td></tr>';
		// Penalty feld
		$out.= '<tr><th scope="row" ><label for="penalty">' . __('Strafpunkte', 'wpcs') . ':</label></th>' . "\n";
		$out.= '<td><input name="penalty" id="penalty" class="postform" tyoe="text" size="3" maxlength="3" value="' . $resed['penalty'] . '">' . "\n";
		$out.= '</td></tr>';
		$out.= '</table>' . "\n";
		// add submit button to form
		
		if ($action == 'edit') $out.= '<p class="submit"><input type="submit" name="update" value="' . __('Mannschaft speichern', 'wpcs') . ' &raquo;" /></p></form></div>' . "\n";
		else $out.= '<p class="submit"><input type="submit" name="submit" value="' . __('Mannschaft hinzufügen', 'wpcs') . ' &raquo;" /></p></form></div>' . "\n";
		echo $out;
		//
		
		// output teams table
		
		//
		$out = "";
		$out.= "<div class=\"wrap\">";
		$out.= "<h2>" . __("Mannschaften", "wpcs") . "</h2>\n";
		$out.= "<table class=\"widefat\"><thead><tr>\n";
		$out.= '<th scope="col" style="text-align: center">ID</th>' . "\n";
		$out.= '<th scope="col">' . __('Name', "wpcs") . "</th>" . "\n";
		$out.= '<th scope="col">' . __('Shortname', "wpcs") . "</th>" . "\n";
		$out.= '<th scope="col">' . __("Symbol / Wappen", "wpcs") . '</th>' . "\n";
		$out.= '<th scope="col" style="text-align: center;width:90px">' . __('Gruppe', "wpcs") . '</th>' . "\n";
		$out.= '<th scope="col" style="text-align: center;width:90px">' . __('Platzierung', "wpcs") . '</th>' . "\n";
		$out.= '<th scope="col" style="text-align: center;width:90px">' . __('Strafpunkte', "wpcs") . '</th>' . "\n";
		$out.= '<th scope="col" style="text-align: center">' . __('Aktion', "wpcs") . '</th>' . "</tr></thead>\n";
		// teams loop
		
		if (file_exists(get_stylesheet_directory() . '/wp-championship/icons/')) {
			$iconpath = get_stylesheet_directory_uri() . '/wp-championship/icons/';
		}
		else {
			$iconpath = plugins_url('icons/', __FILE__);
		}
		$sql = "select * from  $cs_team where name not like '#%' order by tid;";
		$results = $wpdb->get_results($sql);
		
		foreach ($results as $res) {
			$out.= "<tr><td style='text-align:center'>" . $res->tid . "</td><td>" . $res->name . "</td>";
			$out.= "<td>" . $res->shortname . "</td>";
			$out.= "<td><img src='" . $iconpath . $res->icon . "' alt='icon' />" . $res->icon . "</td><td style='text-align:center'>&nbsp;" . $res->groupid . "</td>";
			$out.= "<td style='text-align:center'>" . $res->qualified . "</td>";
			$out.= "<td style='text-align:center'>" . $res->penalty . "</td>";
			$out.= "<td style='text-align:center'><a href=\"" . $thisform . "&amp;action=modify&amp;tid=" . $res->tid . "\">" . __("Ändern", "wpcs") . "</a>&nbsp;&nbsp;&nbsp;";
			$out.= "<a href=\"" . $thisform . "&amp;action=remove&amp;tid=" . $res->tid . "\">" . __("Löschen", "wpcs") . "</a></td></tr>\n";
		}
		$out.= '</table></div>' . "\n";
		echo $out;
	}
} //make it pluggable

?>