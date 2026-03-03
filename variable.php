<?php
// Read the file
$filename = 'card.png.txt';
$content = file_get_contents($filename);

// Display hello world with name
echo "Hello World, my name is Jean Paul!\n\n";

// Display all content
echo "=== COMPLETE FILE CONTENT ===\n";
echo $content;
echo "\n\n";

// Extract and display names
preg_match_all('/\b([A-Z][a-z]+)\b/', $content, $names);
echo "=== NAMES FOUND ===\n";
print_r(array_unique($names[0]));
echo "\n";

// Extract and display emails
preg_match_all('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $content, $emails);
echo "=== EMAILS FOUND ===\n";
print_r(array_unique($emails[0]));
echo "\n";

// Extract and display all numbers
preg_match_all('/\b\d+\.?\d*\b/', $content, $numbers);
echo "=== ALL NUMBERS FOUND ===\n";
print_r($numbers[0]);
echo "\n";

// Extract and display prices
preg_match_all('/\$(\d+\.?\d*)/', $content, $prices);
echo "=== PRICES FOUND ===\n";
print_r($prices[1]);
echo "\n";

// Calculate total of all prices
$total = array_sum($prices[1]);
echo "=== TOTAL OF ALL PRICES ===\n";
echo "Total: $" . number_format($total, 2) . "\n";
echo "\n";

// Extract and display ages
preg_match_all('/(\d+)\s+years?\s+old/', $content, $ages);
echo "=== AGES FOUND ===\n";
print_r(array_unique($ages[1]));
echo "\n";

// Display line by line
echo "=== LINE BY LINE BREAKDOWN ===\n";
$lines = explode("\n", $content);
foreach ($lines as $index => $line) {
    if (trim($line) != "") {
        echo "Line " . ($index + 1) . ": " . $line . "\n";
    }
}
