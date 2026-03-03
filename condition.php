<?php
// Simple command line version
echo "===== BANK ACCOUNT OPENING SYSTEM =====\n\n";

// Get user's age
echo "Enter your age: ";
$age = trim(fgets(STDIN));

// Check if age is greater than 20
if ($age > 20) {
    echo "\n Congratulations! You are eligible to open an account.\n";
    echo "Your account has been successfully created!\n";
} else {
    echo "\n Sorry! You must be older than 20 years to open an account.\n";
    echo "Current age: $age years (Minimum required: 21 years)\n";
}
