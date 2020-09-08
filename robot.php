<?php

const North = 1;
const East = 2;
const South = 3;
const West = 4;

$pathdirection = [1 => "North", 2 => "East", 3 => "South", 4 => "West"];

const Robot_1 = 1;
const Robot_2 = 1;
const Robot_3 = -1;
const Robot_4 = -1;

$x = $argv[1];
$y = $argv[2];

if (!is_numeric($x) || !is_numeric($y)) {
    die("\nThe number should be integer\n");
}

$currentDirection = $argv[3];

if ($currentDirection != 'North' && $currentDirection != 'East' && $currentDirection != 'South' && $currentDirection != 'West') {
    die("\n You are in wrong direction \n");
}

$directionNumber = constant($currentDirection);
$path = $argv[4];

for ($i = 0; $i < strlen($path); $i++) {

    switch ($path($i)) {
        case 'R':
            if ($directionNumber == 4) {
                $directionNumber = 1;
            } else {
                $directionNumber++;
            }
            break;
        case 'L':
            if ($directionNumber == 1) {
                $directionNumber = 4;
            } else {
                $directionNumber--;
            }
            break;
        case 'W':
            if (!($directionNumber % 2)) {
                $x += ($path($i + 1) * constant("Robot_" . $directionNumber));
            } else {
                $y += ($path($i + 1) * constant("Robot_" . $directionNumber));
            }
            $i++;
            break;
        default:
            if (is_numeric($path($i))) {
                echo "\n number range is 0-9\n";
            } else {
                echo "\n Character is '" . $path($i) . "' is not valid\n";
            }
            break;
    }
}

echo $x . " " . $y . " " . $pathdirection[$directionNumber] . "\n";
