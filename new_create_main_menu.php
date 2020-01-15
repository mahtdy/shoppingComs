<?php
include_once("newcoms/Database.php");
	$jsonstring = $_GET['jsonstring'];
	// Decode it into an array
	$jsonDecoded = json_decode($jsonstring, true, 64);

	function parseJsonArray($jsonArray, $parentID = 0)
	{
	  $return = array();
	  foreach ($jsonArray as $subArray) {
		 $returnSubSubArray = array();
		 if (isset($subArray['children'])) {
		   $returnSubSubArray = parseJsonArray($subArray['children'], $subArray['id']);
		 }
		 $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
		 $return = array_merge($return, $returnSubSubArray);
	  }

	  return $return;
	}
	$readbleArray = parseJsonArray($jsonDecoded);
	// Loop through the "readable" array and save changes to DB
	foreach ($readbleArray as $key => $value) {
		// $value should always be an array, but we do a check
		if (is_array($value)) {
		// Update DB
			$query1="UPDATE new_main_menu SET 
									rang='". $key ."', 
									parent_id='".$value['parentID']."' 
									WHERE id='".$value['id']."'" ;
			$coms_conect->query($query1);
		}
	}
?>