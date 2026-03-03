<?php
// Initialize variable
$x = 1;

echo "Printing numbers from $x to 25 using while loop:\n";
echo "============================================\n";

// While loop - runs as long as x is less than 26
while ($x < 26) {
    echo "x = " . $x . "\n";
    $x++; // Increment x by 1 each time
}

echo "\nLoop finished! x is now: " . $x . "\n";
echo "Loop stopped because x is no longer less than 26.\n";

// Another example - printing even numbers
echo "\n\nEven numbers between 1 and 25:\n";
echo "==============================\n";
$y = 2;
while ($y < 26) {
    echo $y . " ";
    $y += 2;
}

// Another example - counting backwards
echo "\n\n\nCounting backwards from 25 to 1:\n";
echo "================================\n";
$z = 25;
while ($z >= 1) {
    echo $z . " ";
    $z--;
}
