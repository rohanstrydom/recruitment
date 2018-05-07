<?php

    function candidate_retrieve_position_answers(){

        // $position = $_POST['position'];
        // $phone_number = $_POST['phone_number'];

        // hard coded
        $position = '0DIGB0E020180413';
        $phone_number = '0823749048';

        $answer_one = '';
        $answer_two = '';
        $answer_three = '';
        $accepted = '';

        // get the candidate
        $candidate = get_page_by_title( $phone_number, OBJECT, 'candidate' );

        // candidate already exist, so update
        if ( is_object($candidate)){
    
            // get the positions applied for Repeater field
            $positions = get_field('positions_applied', $candidate->ID);

            if($positions)
            {
                while( have_rows('positions_applied', $candidate->ID) ) : the_row();
        
                    if (get_sub_field('position')->post_title == $position){
                        
                        $answer_one = get_sub_field('answer_one');
                        $answer_two = get_sub_field('answer_two');
                        $answer_three = get_sub_field('answer_three');
                        $accepted = get_sub_field('accepted');

                        $answers_array = array(
                            'phone_number' => $phone_number,
                            'position' => $position,
                            'answer_one' => $answer_one,
                            'answer_two' => $answer_two,
                            'answer_three' => $answer_three,
                            'accepted' => $accepted
                        );

                        $response = array(
                            'what'=>'answers',
                            'id'=>$phone_number,
                            'data'=>json_encode($answers_array)
                         );
                
                        $xmlResponse = new WP_Ajax_Response($response);
                
                        $xmlResponse->send();

                        return;

                    }

                endwhile;
    
            }
        }
    }
?>