<!-- hehe -->
<?php

$people[] = "Steve";
$people[] = "John";
$people[] = "Kathy";
$people[] = "Evan";
$people[] = "Anthony";
$people[] = "Tom";
$people[] = "Rhonda";
$people[] = "Hal";
$people[] = "Ernie";
$people[] = "Johanna";
$people[] = "Farrah";
$people[] = "Linda";
$people[] = "Shawn";
$people[] = "Olivia";
$people[] = "Derek";
$people[] = "Amanda";
$people[] = "Rachel";
$people[] = "Katie";
$people[] = "Jillian";
$people[] = "Jose";
$people[] = "Malcom";
$people[] = "Greg";
$people[] = "Mary";
$people[] = "Brad";
$people[] = "Mike";

// get Query string
$q = $_REQUEST['q'];
$suggestions = "";
// get sugesstions
if ($q !== '') {
    $q = strtolower($q);
    $qlen = strlen($q);
    foreach($people as $person) {
        if (stristr($q, substr($person, 0, $qlen))) {
            if ($suggestions === "") {
                $suggestions .= $person; 
            } else {
                $suggestions .= ",$person";
            }
        }
    }
} 
echo $suggestions === "" ? "No Suggestions" : $suggestions;

?>