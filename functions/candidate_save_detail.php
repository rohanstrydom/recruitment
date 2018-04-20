<?php

    // name, surname, email etc.
    function candidate_save_detail(){

        $phone_number = $_POST['phone_number'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $id_number = $_POST['id_number'];

        return true;
        return false;

    };

?>