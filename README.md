## Quick Setup

1. Extract folder proj into htdocs directory or in htdocs git clone https://github.com/ShivMoh/Tempus_Fugit_PHP_Assignment_II.git
2. Start XAMMP and MySql
3. Create database test in PhpMyAdmin
3. Navigate to /proj

## Config

If desirable to run the project within a subdirectory within htdocs, simply change global variables BASE_URL, RESOURCE_PATH and CSS_PATH found within inc/core/config.php

For example if you want to run the application from a subfolder within htdocs called personal such that personal can be found within htdocs and the project folder, proj, can be found within personal, change the global variables as shown below:

#### Example Folder Structure
    htdocs
        ..personal
            ..proj

1. BASE_URL = "/personal/proj";
2. CSS_PATH = "http://localhost/personal/proj/public/css/"
3. RESOURCE_URL = "http://localhost/personal/proj/public/images/"

## Database Initialize

The project will initialize the database with data upon running the project the first time. If an issue occurs or it is desirable to reinitialize the database values, do the following steps:

1. Drop existing tables in database test
2. Delete existing session cookie 
    - Inspect webpage
    - Naviate to Application Tab
    - Find cookies
    - Delete session cookie under http://localhost...

## CSS Not Loading

In the unlikely event that the styling of the webpage does is not present, the do the following steps:

1. Go to Browser settings
2. Search for clear browsing history
3. Select option to clear _Cache image and files_ (or similar option. Instructions based off of Chrome Web Browser)
4. Reload webpage

 _Please see figma file for intended design of the website to get an idea_: https://www.figma.com/file/CpIRBICRaH4dku8PVfwDsJ/CSE3101_Design_Assigment_2?type=design&node-id=0%3A1&mode=design&t=FQXvdimrpZpFMqSp-1. 


