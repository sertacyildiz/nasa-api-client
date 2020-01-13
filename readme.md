# Nasa API Client
 
 ## Introduction
 
>  Nasa API Client, imports "Mars Rover Photos"  and saves image sources to DB.


 #### Environment:
 - PHP 7.2
 - Laravel 5.8
 - Guzzle HTTP Client
 - Mysql
 
 #### Design Pattern:
> Service Layer Design Pattern 
 
 ## Installation
 
 - First, run from console:
-     npm install

 - Create a Mysql DB and modify DB connection auth informations on .env file

 - Run from console:
 
-     php artisan migrate

 - Modify .env file and enter nasa api key. If you don't have an api key: https://api.nasa.gov/

 - Sample configurations exist in ".env.backup" file
 
 
 ## Usage
 
> Test URL: http://nasa.test/request
 
 - Select time period dates and click "Import" button to create import requests to import mars rover photos.

 - Run this command from terminal, then import processes will start for all requests:
-     php artisan import:photos 

- If you want to remove all requests and records, click "Flush" button on the page.
