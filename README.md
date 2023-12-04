
# Quick Setup Guide

1. **Extract** the `Tempus_Fugit` folder into the `htdocs` directory or use `git clone` to clone the repository from <https://github.com/ShivMoh/Tempus_Fugit.git> into `htdocs`.
2. **Start** XAMPP and MySQL.
3. **Create** a database named `karens_kitchen` in PhpMyAdmin.
4. **Navigate** to the `/Tempus_Fugit` directory.

## Configuration Settings

To run the project in a subdirectory within `htdocs`, adjust the global variables `BASE_URL`, `RESOURCE_PATH`, and `CSS_PATH` in `inc/core/config.php`.

For instance, to run the application from a subfolder named `personal` (located within `htdocs` and containing the `Tempus_Fugit` project folder), modify the global variables as follows:

#### Example Folder Structure:

    htdocs
    ├── personal
        └── proj

1. `BASE_URL = "/personal/Tempus_Fugit";`
2. `CSS_PATH = "http://localhost/personal/Tempus_Fugit/public/css/"`
3. `RESOURCE_URL = "http://localhost/personal/Tempus_Fugit/public/images/"`

## Database Initialization

The project automatically initializes the database with data on the first run. To reinitialize the database, if needed, follow these steps:

1. **Drop** existing tables in the `test` database.
2. **Delete** the existing session cookie:
   - Open browser's inspect tool.
   - Navigate to the Application Tab.
   - Locate and delete the session cookie under `http://localhost`...

## CSS Loading Issues

If the webpage styling isn't appearing, perform these steps:

1. Go to your browser's settings.
2. Search for and select the option to clear browsing history.
3. Specifically, choose to clear _Cache images and files_ (instructions based on Chrome Web Browser).
4. Reload the webpage.

_For a visual reference of the intended website design, please refer to the Figma file:_ <https://www.figma.com/file/CpIRBICRaH4dku8PVfwDsJ/CSE3101_Design_Assigment_2?type=design&node-id=0%3A1&mode=design&t=FQXvdimrpZpFMqSp-1>.
