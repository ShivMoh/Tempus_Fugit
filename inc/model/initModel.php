<?php

// include database
require __DIR__."/database/Database.php";

// include records here to be used by managers here
require __DIR__."/Model.php";
require __DIR__."/BaseModel.php";
require __DIR__."/models/UserModel.php";
require __DIR__."/models/BillModel.php";
require __DIR__."/models/EmployeeModel.php";
require __DIR__."/models/MenuItemModel.php";
require __DIR__."/models/BillItemModel.php";

// include any managers here
require __DIR__."/managers/UserManager.php";
require __DIR__."/managers/BillManager.php";
