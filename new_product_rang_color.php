<?php
include_once("newcoms/Database.php");
	$jsonstring = $_GET['jsonstring'];
//	$jsonstring1 = $_GET['jsonstring1'];
	// Decode it into an array
	$jsonDecoded = json_decode($jsonstring, true, 64);
//	$jsonDecoded1 = json_decode($jsonstring1, true, 64);

	/* Function to parse the multidimentional array into a more readable array 
	 * Got help from stackoverflow with this one:
	 *    http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-db-flat?answertab=active#tab-top
	*/
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
			$query1="UPDATE new_product_color SET 
									rang='". $key ."'
									WHERE id='".$value['id']."'" ;
//			echo $query1.'asas';
			$coms_conect->query($query1);
		}
	}

//	$readbleArray1 = parseJsonArray($jsonDecoded1);
//	// Loop through the "readable" array and save changes to DB
//	foreach ($readbleArray1 as $key => $value1) {
//		// $value should always be an array, but we do a check
//		if (is_array($value1)) {
//
//			// Update DB
//			$query1="UPDATE new_product_size SET
//									rang='". $key ."'
//									WHERE id='".$value1['id']."'" ;
////			echo $query1.'asas';
//			$coms_conect->query($query1);
//		}
//	}
//
