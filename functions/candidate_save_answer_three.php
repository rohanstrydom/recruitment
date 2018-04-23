<?php

    // answer to the third question
    function candidate_save_answer_three(){
        
        $phone_number = $_POST['phone_number'];
        $position_code = $_POST['position_code'];
        $answer_three = $_POST['answer_three'];

        // $phone_number = '0823749048';
        // $position_code = '0DIGB0E020180413';
        // $answer_three = 'This is my demo answer for the third question';

        // get the candidate
        $candidate = get_page_by_title( $phone_number, OBJECT, 'candidate' );

        // candidate already exist, so update
        if ( is_object($candidate)){
    
            // get the positions applied for Repeater field
            $positions = get_field('positions_applied', $candidate->ID);

            if($positions)
            {
                while( have_rows('positions_applied', $candidate->ID) ) : the_row();
        
                    if (get_sub_field('position')->post_title == $position_code){
                        
                        update_sub_field('answer_three', $answer_three);

                        return (true);

                    }

                endwhile;
    
            }
        }
    }

?>