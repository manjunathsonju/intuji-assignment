<?php
$hostname = "http://localhost/intuji-assignment";

$conn = mysqli_connect("localhost", "user1", "password1", "manju_cms") or die("Connection failed : " . mysqli_connect_error());

// Google API configuration 
define('GOOGLE_CLIENT_ID', 'put_something_here');
define('GOOGLE_CLIENT_SECRET', 'put_something_here');
define('GOOGLE_OAUTH_SCOPE', 'https://www.googleapis.com/auth/calendar');
define('REDIRECT_URI', 'http://localhost/intuji-assignment/admin');

// Start session 
if (!session_id()) session_start();

// Google OAuth URL 
$googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode(GOOGLE_OAUTH_SCOPE) . '&redirect_uri=' . REDIRECT_URI . '&response_type=code&client_id=' . GOOGLE_CLIENT_ID . '&access_type=online';
