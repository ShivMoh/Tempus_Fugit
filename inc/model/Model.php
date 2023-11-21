<?php
    // only these functions defined here along
    // with any setter and getters for relevant attributes
    // should be allowed in records/models
    // any additional logic needed should be attributed to a respective manager.
    interface Model {
        public function create();
        public function findAll();
        public function findById($id);
        public function update($id);
        public function delete($id);
    }

