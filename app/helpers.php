<?php

if (!function_exists('array_sort_by_column')) {
    function array_sort_by_column(&$array, $column, $direction = SORT_ASC) {
        $reference_array = array();

        foreach($array as $key => $row) {
            $reference_array[$key] = $row[$column];
        }

        array_multisort($reference_array, $direction, $array);
    }
}
if (!function_exists('deleteElement')) {
	function deleteElement($element, &$array){
	    $index = array_search($element, $array);
	    if($index !== false){
	        unset($array[$index]);
	    }
	}
}