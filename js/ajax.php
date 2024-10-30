<?php
if (!function_exists('add_action'))
{
    require_once("../../../../wp-config.php");
}
	global $wpdb;
	$table = $wpdb->prefix."leaveanote";
	$posTop=$_POST['posTop'];
	$posLeft=$_POST['posLeft'];
	$oldTop=$_POST['oldTop'];
	$oldLeft=$_POST['oldLeft'];
	$dataarray = array('topPos' => $posTop, 'leftPos' => $posLeft);
	$wherearray = array('topPos' => $oldTop, 'leftPos' => $oldLeft);
	$wpdb->update($table, $dataarray, $wherearray);
?>