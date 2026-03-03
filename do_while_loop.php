<?php
// Initialize variable
$y = 5;

echo "Do-While Loop Example\n";
echo "====================\n";
echo "Starting value: y = $y\n";
echo "Condition: y < 12\n\n";

// Do-while loop - executes at least once, then checks condition
do {
    echo "y = " . $y . "\n";
    $y++; // Increment y by 1
} while ($y < 12);

echo "\nLoop finished!\n";
echo "Final value of y: " . $y . "\n";
echo "Loop stopped because y ($y) is no longer less than 12.\n";

// Another example showing do-while always runs at least once
echo "\n\nExample 2: Even when condition is false initially\n";
echo "================================================\n";
$z = 15;

do {
    echo "This runs once even though z ($z) is not < 12\n";
    echo "z = " . $z . "\n";
    $z++;
} while ($z < 12);

echo "\nFinal value of z: " . $z . "\n";
