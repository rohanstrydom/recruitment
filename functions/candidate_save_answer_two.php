<?php

    // answer to the second question
    function candidate_save_answer_two(){
        
        $phone_number = $_POST['phone_number'];
        $position_code = $_POST['position_code'];
        $answer_two = $_POST['answer_two'];

        // $phone_number = '0823749048';
        // $position_code = '0DIGB0E020180413';
        // $answer_two = 'This is my demo answer for the second question';

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
                        
                        update_sub_field('answer_two', $answer_two);

                        return (true);

                    }

                endwhile;
    
            }
        }
    }

?>