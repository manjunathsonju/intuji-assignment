# intuji-assignment
Intuji Assignment
Requirement 
PHP version 7.1
MySQL version: 5.5.5-10.3.39-MariaDB-0ubuntu0.20.04.2

Installation process
1. Create database with the name 'manju_cms'
2. Export database file from database/new-site.sql into the database
3. Copy the project file into the document root
4. start apache and mysql server and navigate to http://localhost/intuji-assignment/admin
5. login using credentials username = 'manjunath' password='admin'
6. Create your app in the google console with the verified email address and add the redirect_url as http://localhost/intuji-assignment/admin/google_calendar_event_sync.php
7. Apply the GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET of your created app in the file intuji-assignment/admin/config.php
8. Input the verified app-domain with their privacy-policy link and terms-conditions link in your google console input field
9. Now the project is ready!!!