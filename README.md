
# Quick Setup Guide

1. **Extract** the `Tempus_Fugit` folder into the `htdocs` directory or use `git clone` to clone the repository from <https://github.com/ShivMoh/Tempus_Fugit.git> into `htdocs`.
2. **Start** php and MySQL in XAMMP.
3. **Create** a database named `karens_kitchen` in PhpMyAdmin.
4. **Navigate** to the `/Tempus_Fugit` directory.

## Configuration Settings

To run the project in a subdirectory within `htdocs`, adjust the global variables `BASE_URL`, `RESOURCE_PATH`, and `CSS_PATH` in `inc/core/config.php`.

For instance, to run the application from a subfolder named `personal` (located within `htdocs` and containing the `Tempus_Fugit` project folder), modify the global variables as follows:

#### Example Folder Structure:

    htdocs
    ├── personal
        └── Tempus_Fugit

1. `BASE_URL = "/personal/Tempus_Fugit";`
2. `CSS_PATH = "http://localhost/personal/Tempus_Fugit/public/css/"`
3. `RESOURCE_URL = "http://localhost/personal/Tempus_Fugit/public/images/"`

Note that `inc/core/config.php` is where the configurations for the database are set. If desirable, go here to change database settings.

## Database Initialization

The project automatically initializes the database with data on the first run. To reinitialize the database, if needed, follow these steps:

1. **Drop** existing tables in the `karens_kitchen` database.
2. **Delete** the existing session cookie:
   - Open browser's inspect tool.
   - Navigate to the Application Tab.
   - Locate and delete the session cookie under `http://localhost`...

Note that the application only initializes menuitems and employees. To see bill on bill tab, please create one or more using the cash register interface.

Also to note, with the set database values for menuitem, bill item and bill, the max price and total is 999999999999999999999999.99999. Therefore, in the unlikely event a number higher than this is calculated or added as the price for an item, it will appear as a math error in calculation. However, it is not so. The values in the database are simply limited to their given size.

## CSS Loading Issues

If the webpage styling isn't appearing, perform these steps:

1. Go to your browser's settings.
2. Search for and select the option to clear browsing history.
3. Specifically, choose to clear _Cache images and files_ (instructions based on Chrome Web Browser).
4. Reload the webpage.

_For a visual reference of the intended website design, please refer to the Figma file:_ <https://www.figma.com/file/CpIRBICRaH4dku8PVfwDsJ/CSE3101_Design_Assigment_2?type=design&node-id=0%3A1&mode=design&t=FQXvdimrpZpFMqSp-1>.

## Inserting Multiple Values

When you need to insert multiple values into fields like _othernames_ for employees or _tags_ and _ingredients_ for menu items, enter the values separated by commas without spaces, like "tag1,tag2,tag3". These fields display instructions through the HTML _title_ attribute when you hover over them. However, be aware that these instructions might take some time to appear or, in some cases, might not load correctly.

## Understanding Action Buttons

For clarity on the function of each action button, simply hover your cursor over them. A brief description will appear, usually within half a second, to guide you on their specific purpose.
