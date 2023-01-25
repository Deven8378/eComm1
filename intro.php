<?php

//dont close the php unless you have to ?>
<?= 'These are echo tags <br>'  ?>
<?php echo 'these are the echo tags <br>' ; ?>

<?php
//variables, have to start with letter or underscore
$_variableCamelCase = null;

$x = 4;

$y = 5.2;

$txt = 'single quotes are for string literal (no variables) <br>';

$text = "I love php $x times"; //string that gets parsed
echo $text;

$values = array(4,5,4.7,$x,$y,$txt);
echo '<pre>';
var_dump($values); //great for debugging
echo '</pre>';

$values2 = ['text',4,$values];
echo '<pre>';
print_r($values2); //to see output
echo '</pre>';

//if, elseif, else
$score = 40;
if ($score < 60) {
	$score = 'F';
} elseif ($score < 70) {
	$score = 'D';
} elseif ($score < 80) {
	$score = 'C';
} elseif ($score < 90) {
	$score = 'B';
} else
$score = 'A';
echo "$score <br>";

switch ($score) {
	case 'A':
	case 'B':

		echo "you pass <br>";
		break;
	case 'C':
	case 'D':
		echo "you pass but can do better <br>";
		break;
	
	default:
		echo "you fail <br>";
		break;
}

//looping

//while
$i = 0;
while ($i < count($values)) {
	echo $i, ' => ', $values[$i] , '<br>';
	$i++;
}

//for loop
for ($j = 0; $j < count($values); $j++) {
	echo $j, ' => ', $values[$j] , '<br>';
}

//for each loop, for one single element
foreach ($values as $i => $value) {
	echo $i, ' => ', $value , '<br>';
}

//they are dictionaries
$associativeArray = ['key1' => 'value1', 'key2' => 'value2', "score" => $score, "valuesArray" => $values];

foreach($associativeArray as $key => $value) {
	if (is_array($value)) {
		echo $key, ' => ';
		var_dump($value);
		echo '<br>';
	} else
	echo $key, ' => ', $value, '<br>';
}

//functions
function recursiveEcho($stuff) {
	if (!is_array($stuff)) {
		echo $stuff;
		return;
	}
	echo '[';
	foreach($stuff as $key => $value) {

		if (is_array($value)) {
			echo $key, '=>';
			recursiveEcho($value);
		} else {

			echo $key, ' => ', $value, '<br>';
		}
	}
	echo ']';
}

echo '<br><br> ******************** <br>';
recursiveEcho($associativeArray);
recursiveEcho($score);

?>
