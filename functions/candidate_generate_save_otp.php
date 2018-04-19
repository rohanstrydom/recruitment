<?php

// save OTP so that we can compare what it should be
function candidate_generate_save_otp(){

    // we need the phone number of the candidate, as well as the position being applied for.
    $phone_number = $_POST['phone_number'];
    $position_code = $_POST['position_code'];
    //$phone_number = '0823749048';
    //$position_code = '0DIGB0E020180413';

    $otp = generate_otp();
    // get the Candidate post ID

    $candidate = get_page_by_title( $phone_number, OBJECT, 'candidate' );

    // candidate already exist, so update
    if ( is_object($candidate)){

        // get the positions applied for Repeater field
        $positions = get_field('positions_applied', $candidate->ID);

        if($positions)
        {

            foreach($positions as $position)
            {
                // find the current position being applied for
                if ($position['position']->post_title == $position_code){

                    //print_r ($position);

                    $current_position_index = get_row_index(); // know which row (position) we are currently looking at

                    echo $otp;

                    $new_row_value = array(
                        'otp'	=> $otp,
                        'alt'	=> 'Another great sunset',
                        'link'	=> 'http://website.com'
                    );

                    $update_row_success = update_row( 'positions_applied', $current_position_index, $new_row_value, $candidate->ID );

                    if ($update_row_success == true){
                        
                        echo 'success';
                        return 'success';
                    }
                    else {
                        
                        echo 'fail';
                        return 'fail';

                    }
                }
                
            }
        }
    }
}


function generate_otp(){

    // code to generate otp, to be done still
    $otp = '123456';

    return $otp;

}

?>