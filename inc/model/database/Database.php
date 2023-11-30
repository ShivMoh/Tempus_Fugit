<?php
  
    
    class Database {

        protected $connection;

        private $create_statements = [
            "CREATE TABLE IF NOT EXISTS Account( 
                id                  INT AUTO_INCREMENT,
                first_name          VARCHAR(30) NOT NULL,
                last_name           VARCHAR(30) NOT NULL,
                email               VARCHAR(50) NOT NULL,
                passcode            VARCHAR(100) NOT NULL,
                role                VARCHAR(10),
                PRIMARY KEY         (id)
            );",
            "CREATE TABLE IF NOT EXISTS Bill(
                id                  INT AUTO_INCREMENT,
                number_of_items     INT(20) NOT NULL,
                total_cost          FLOAT(10, 5) NOT NULL,
                order_date          DATE,
                status              BOOLEAN,
                PRIMARY KEY         (id)
                );",
            "CREATE TABLE IF NOT EXISTS MenuItem(
                id                  INT AUTO_INCREMENT,
                name                VARCHAR(30) NOT NULL,
                price               INT(10) NOT NULL,
                description         TEXT,
                image               VARCHAR(100),
                discount            FLOAT(10, 2),
                tags                VARCHAR(100),
                ingredients         VARCHAR(100),
                PRIMARY KEY         (id)
            );",
            "CREATE TABLE IF NOT EXISTS BillItem(
                id                  INT AUTO_INCREMENT,
                name                VARCHAR(30) NOT NULL,
                price               FLOAT(10, 5) NOT NULL,
                amount              INT(20) NOT NULL,
                discount            FLOAT(10, 2),
                bill_id             INT NOT NULL,
                menu_item_id        INT NOT NULL,
                FOREIGN KEY         (bill_id) REFERENCES Bill(id) ON DELETE CASCADE, 
                FOREIGN KEY         (menu_item_id) REFERENCES MenuItem(id) ON DELETE CASCADE, 
                PRIMARY KEY         (id)
                );",
            "CREATE TABLE IF NOT EXISTS Employee(
                id                  INT AUTO_INCREMENT,
                first_name          VARCHAR(30) NOT NULL,
                last_name           VARCHAR(30) NOT NULL,
                other_names         VARCHAR(100),
                gender              BOOLEAN,
                age                 INT(20),
                dob                 DATE,
                job_role            ENUM('val1', 'val2', 'val3', 'val4') NOT NULL,
                email               VARCHAR(20) NOT NULL,
                contact_number      VARCHAR(20) NOT NULL,
                image_url           VARCHAR(100),
                status              BOOLEAN,
                PRIMARY KEY         (id)
            );"
        ];

        private $initUserSQL = 
            "INSERT IGNORE INTO account(first_name, last_name, email, passcode, role)
             VALUES (:fName,:lName,:email,:passcode, 'superuser')
            ";
        
        private $initMenuItemSQL =
            "INSERT INTO MenuItem(name, price, description, image, discount, tags, ingredients)
             VALUES (:name, :price, :description, :image, :discount, :tags, :ingredients)
            ";

        public function connect() {
            $driver = DB_DRIVER;
            $host = DB_HOST;
            $db = DB_NAME;
            $user = DB_USER;
            $password =DB_USER_PASSWORD;
    
            $dsn = "$driver:host=$host;dbname=$db;charset=UTF8";
    
            // connect to database and configure PDO to throw and execption if errors occur
            $this->connection = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }

        public function init() {
            $this->connect();
            try {
                if ($this->connection) {
                    foreach($this->create_statements as $statement) {
                        // execute SQL create table function
                        $this->connection->exec($statement);
                    }
                    $this->seed();
                    $this->menuItemInit();
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        private function seed() {
            $result = $this->connection->query("SELECT count(id) as count FROM account WHERE role = 'superuser'");
            $data = $result->fetch();
            if($data["count"] > 0) return;

            $passcode = password_hash("vnkdqoi483023=;.1?", PASSWORD_DEFAULT);
            $superuser = [
                "fName"=> "Ramchun",
                "lName"=> "Omatayo",
                "email"=> "cse3101@gmail.com",
                "passcode"=> $passcode
            ];
            $statement = $this->connection->prepare($this->initUserSQL);
            $statement->execute($superuser);
        }

        private function menuItemInit(){

        $result = $this->connection->query("SELECT count(id) as count FROM MenuItem");
        $data = $result->fetch();
        if($data["count"] > 0) return;

            $menu_data_1 = [
                'name' => 'Chocolate Chip Ice Cream',
                'price' => 1000,
                'description' => 'Creamy vanilla ice cream with swirls of chocolate chips.',
                'image' => 'chocolate-chip-ice-cream.png',
                'discount' => 0.15,
                'tags' => 'chocolate, desert',
                'ingredients' => 'ice cream, chocolate chip, chocolate syrup'
            ];

            $menu_data_2 = [
                'name' => 'Strawberry Swirl Sundae',
                'price' => 1500,
                'description' => 'Fresh strawberries layered with vanilla ice cream and topped with whipped cream.',
                'image' => 'strawberry-swirl-sundae.png',
                'discount' => 0.20,
                'tags' => 'strawberry, dessert',
                'ingredients' => 'strawberries, ice cream'
            ];
        

        $statement = $this->connection->prepare($this->initMenuItemSQL);
        $statement2 = $this->connection->prepare($this->initMenuItemSQL);
        $statement->execute($menu_data_1);
        $statement2->execute($menu_data_2);
    }
        

        public function getConnection() {
            return $this->connection;
        }
    }

?>
