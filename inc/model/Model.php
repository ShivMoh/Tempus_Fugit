<?php

interface Model {
    
     // Create a new record.
    public function create();

    
     // Retrieve all records.
    public function findAll();

    
     // Retrieve a record by its ID.
    public function findById();
    
     // Update an existing record.
    public function update();

    
     // Delete a record.
    public function delete();
}
