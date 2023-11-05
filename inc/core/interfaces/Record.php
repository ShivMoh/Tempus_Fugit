<?php

    interface Record {
        public function create();
        public function find_all();
        public function find_by_id($id);
        public function update();
        public function delete();
    }

?>