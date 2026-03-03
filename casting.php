<?php
// Define constant for repeated string
define('TYPE_LABEL', ' (Type: ');

// Original variables
$x = 5;
$name = "php learning";

echo "===== ORIGINAL VARIABLES =====\n";
echo "\$x = " . $x . TYPE_LABEL . gettype($x) . ")\n";
echo "\$name = " . $name . TYPE_LABEL . gettype($name) . ")\n\n";

// Convert $x to different types
echo "===== CASTING \$x = 5 =====\n";

// To float
$float_x = (float) $x;
echo "to float: " . $float_x . TYPE_LABEL . gettype($float_x) . ")\n";

// To string
$string_x = (string) $x;
echo "to string: " . $string_x . TYPE_LABEL . gettype($string_x) . ")\n";

// To boolean
$bool_x = (bool) $x;
echo "to boolean: " . ($bool_x ? 'true' : 'false') . TYPE_LABEL . gettype($bool_x) . ")\n";

// To array
$array_x = (array) $x;
echo "to array: ";
print_r($array_x);
echo TYPE_LABEL . gettype($array_x) . ")\n\n";

// Convert $name to different types
echo "===== CASTING \$name = \"php learning\" =====\n";

// To integer (will become 0 because string doesn't start with number)
$int_name = (int) $name;
echo "to integer: " . $int_name . TYPE_LABEL . gettype($int_name) . ")\n";

// To float (will become 0)
$float_name = (float) $name;
echo "to float: " . $float_name . TYPE_LABEL . gettype($float_name) . ")\n";

// To boolean (true if string is not empty)
$bool_name = (bool) $name;
echo "to boolean: " . ($bool_name ? 'true' : 'false') . TYPE_LABEL . gettype($bool_name) . ")\n";

// To array
$array_name = (array) $name;
echo "to array: ";
print_r($array_name);
echo TYPE_LABEL . gettype($array_name) . ")\n\n";

// Additional examples with different string
$number_string = "123";
echo "===== EXTRA EXAMPLE WITH \"123\" =====\n";
echo "String \"123\" to integer: " . (int)$number_string . "\n";
echo "String \"123\" to float: " . (float)$number_string . "\n";
