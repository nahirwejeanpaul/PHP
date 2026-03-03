<?php
// Define the variable
$day = "Wednesday";

echo "Day is: " . $day . "\n\n";

// Switch statement to check the day
switch ($day) {
    case "Monday":
        echo "It's Monday! Start of the work week.";
        break;

    case "Tuesday":
        echo "It's Tuesday! Second day of the week.";
        break;

    case "Wednesday":
        echo "It's Wednesday! Middle of the week.";
        echo "\nWe are halfway through!";
        break;

    case "Thursday":
        echo "It's Thursday! Almost Friday.";
        break;

    case "Friday":
        echo "It's Friday! Weekend is coming!";
        break;

    case "Saturday":
        echo "It's Saturday! Weekend fun!";
        break;

    case "Sunday":
        echo "It's Sunday! Relax, tomorrow is Monday.";
        break;

    default:
        echo "Invalid day entered!";
}

echo "\n\n";

// Another example with multiple cases
$day2 = "Saturday";

echo "Second example with day = " . $day2 . "\n";

switch ($day2) {
    case "Monday":
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
    case "Friday":
        echo "It's a weekday. Time to work!";
        break;

    case "Saturday":
    case "Sunday":
        echo "It's the weekend! Time to relax!";
        break;

    default:
        echo "Invalid day!";
}
