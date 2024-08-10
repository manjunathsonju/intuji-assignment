<?php
$hostname = "http://localhost/intuji-assignment";

$conn = mysqli_connect("localhost", "user1", "password1", "manju_cms") or die("Connection failed : " . mysqli_connect_error());

// Google API configuration 
define('GOOGLE_CLIENT_ID', '336649337331-v1esl290u8rcfeqr0iafb7meiok8kf27.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', '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');
define('GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/calendar');
define('REDIRECT_URI', 'http://localhost/intuji-assignment/admin/google_calendar_event_sync.php');

// Start session 
if (!session_id()) session_start();

// Google OAuth URL 
$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode(GOOGLE_OAUTH_SCOPE) . '&redirect_uri=' . REDIRECT_URI . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online';
