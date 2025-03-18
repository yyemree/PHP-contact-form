<?php
// filepath: c:\Users\x\Desktop\about github\php_project\form.php

// Function to sanitize input
function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to display error messages
function displayErrors($errors) {
    if (!empty($errors)) {
        echo '<div style="color: red; margin-bottom: 20px;">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
}

// Initialize variables
$errors = [];
$feedback = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $bdate = sanitizeInput($_POST['bdate'] ?? '');
    $eventTime = sanitizeInput($_POST['event'] ?? '');
    $artist = sanitizeInput($_POST['artist'] ?? '');
    $description = sanitizeInput($_POST['description'] ?? '');
    $promo = sanitizeInput($_POST['promo'] ?? '');
    $venueName = sanitizeInput($_POST['venue_name'] ?? '');
    $venueAddress1 = sanitizeInput($_POST['venue_address_1'] ?? '');
    $venueAddress2 = sanitizeInput($_POST['venue_address_2'] ?? '');
    $city = sanitizeInput($_POST['city'] ?? '');
    $region = sanitizeInput($_POST['region'] ?? '');
    $postal = sanitizeInput($_POST['postal'] ?? '');
    $country = sanitizeInput($_POST['country'] ?? '');
    $capacity = sanitizeInput($_POST['capacity'] ?? '');
    $attendance = sanitizeInput($_POST['attendance'] ?? '');
    $performance = sanitizeInput($_POST['performance'] ?? '');
    $setTime = sanitizeInput($_POST['time'] ?? '');
    $contactFirstname = sanitizeInput($_POST['contact_firstname'] ?? '');
    $contactLastname = sanitizeInput($_POST['contact_lastname'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $number = sanitizeInput($_POST['number'] ?? '');
    $recorded = sanitizeInput($_POST['recorded'] ?? '');

    // Validate required fields
    if (empty($bdate)) $errors[] = 'Date of Event is required.';
    if (empty($eventTime)) $errors[] = 'Time of Event is required.';
    if (empty($artist)) $errors[] = 'Artist selection is required.';
    if (empty($promo)) $errors[] = 'Promoter\'s Name is required.';
    if (empty($venueName)) $errors[] = 'Venue Name is required.';
    if (empty($city)) $errors[] = 'City is required.';
    if (empty($country)) $errors[] = 'Country is required.';
    if (empty($email)) {
        $errors[] = 'Contact Email is required.';
    } elseif (!validateEmail($email)) {
        $errors[] = 'Invalid email format.';
    }

    // If no errors, process the form
    if (empty($errors)) {
        $feedback = '<h3>Booking Summary:</h3>';
        $feedback .= '<p><strong>Date of Event:</strong> ' . $bdate . '</p>';
        $feedback .= '<p><strong>Time of Event:</strong> ' . $eventTime . '</p>';
        $feedback .= '<p><strong>Artist:</strong> ' . $artist . '</p>';
        $feedback .= '<p><strong>Description:</strong> ' . $description . '</p>';
        $feedback .= '<p><strong>Promoter\'s Name:</strong> ' . $promo . '</p>';
        $feedback .= '<p><strong>Venue Name:</strong> ' . $venueName . '</p>';
        $feedback .= '<p><strong>Venue Address:</strong> ' . $venueAddress1 . ' ' . $venueAddress2 . '</p>';
        $feedback .= '<p><strong>City:</strong> ' . $city . '</p>';
        $feedback .= '<p><strong>Region:</strong> ' . $region . '</p>';
        $feedback .= '<p><strong>Postal Code:</strong> ' . $postal . '</p>';
        $feedback .= '<p><strong>Country:</strong> ' . $country . '</p>';
        $feedback .= '<p><strong>Venue Capacity:</strong> ' . $capacity . '</p>';
        $feedback .= '<p><strong>Expected Attendance:</strong> ' . $attendance . '</p>';
        $feedback .= '<p><strong>Type of Performance:</strong> ' . $performance . '</p>';
        $feedback .= '<p><strong>Set Time:</strong> ' . $setTime . ' minutes</p>';
        $feedback .= '<p><strong>Contact Person:</strong> ' . $contactFirstname . ' ' . $contactLastname . '</p>';
        $feedback .= '<p><strong>Contact Email:</strong> ' . $email . '</p>';
        $feedback .= '<p><strong>Contact Number:</strong> ' . $number . '</p>';
        $feedback .= '<p><strong>Event Recorded:</strong> ' . ucfirst($recorded) . '</p>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Processing</title>
</head>
<body>
    <?php displayErrors($errors); ?>
    <?php if ($feedback): ?>
        <div style="color: green; margin-bottom: 20px;">
            <?php echo $feedback; ?>
        </div>
    <?php endif; ?>
    <a href="form.html">Go Back to Form</a>
</body>
</html>