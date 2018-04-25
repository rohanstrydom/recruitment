<?php

    // get the value of the otp received
    function candidate_check_otp(){ 

        $phone_number = $_POST['phone_number'];
        $position_code = $_POST['position_code'];
        $otp = $_POST['otp'];
        //$phone_number = '0823749048';
        //$position_code = '0DIGB0E020180413';
        //$otp = '123457';

        $candidate = get_page_by_title( $phone_number, OBJECT, 'candidate' );

        // candidate already exist, so update
        if ( is_object($candidate)){
    
            // get the positions applied for Repeater field
            $positions = get_field('positions_applied', $candidate->ID);

            if($positions)
            {
                while( have_rows('positions_applied', $candidate->ID) ) : the_row();
        
                    if (get_sub_field('position')->post_title == $position_code){

                        //print_r ($position);

                        $saved_otp = get_sub_field('otp');

                        if ($otp == $saved_otp){

                            //echo 'true';
                            return (true);
                        }
                        else {
                            
                            //echo 'false';
                            return false;
                        }
                        
                    }

                endwhile;
    
            }
        }
        
    }
?>