<?php
    // just leaving this here
    // will have to fix the naming conventions
    // for any records we make
    interface Record {
        public function create();
        public function find_all();
        public function find_by_id($id);
        public function update();
        public function delete();
    }

?>