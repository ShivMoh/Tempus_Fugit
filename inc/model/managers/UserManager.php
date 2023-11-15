<?php

    class UserManager {

        public function create_standard_user($user) {
            // then create user
            $user->set_role("public");
            $user->set_passcode(password_hash($user->get_passcode(), PASSWORD_DEFAULT));
            $user->create();
            return $user;
        }

        public function create_super_user($data) {
            /* 
                -----validate based on busines logic------
                check if user is already exist
                apply password schema rules for superuser
                check if a superuser already exist
            */
            // then create user
        }


    }

?>