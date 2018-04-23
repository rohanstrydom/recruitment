<?php

    // name, surname, email etc.
    function candidate_save_detail(){

        $phone_number = $_POST['phone_number'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email_address = $_POST['email_address'];
        $id_number = $_POST['id_number'];

        // hard coded
        // $phone_number = '0823749048';
        // $name = 'Rohan';
        // $surname = 'Strydom';
        // $email_address = 'rohan.strydom@gmail.com';
        // $id_number = '1234567890123';

        // get the candidate
        $candidate = get_page_by_title( $phone_number, OBJECT, 'candidate' );

        // update name / surname / email / id number
        update_field('name', $name, $candidate->ID);
        update_field('surname', $surname, $candidate->ID);
        update_field('email_address', $email_address, $candidate->ID);
        update_field('id_number', $id_number, $candidate->ID);

        return true;

    };

?>