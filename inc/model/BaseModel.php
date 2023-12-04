<?php


 // Extend this class to create models for specific entities.
class BaseModel extends Database implements Model {
    
     // Creates a new record in the database.
    public function create() {}

     // Retrieves all records for the associated entity from the database.
    public function findAll() {}

     // Retrieves a record by its unique identifier from the database.
    public function findById() {}

     // Updates the record in the database.
    public function update() {}

     // Deletes the record from the database.
    public function delete() {}
}
