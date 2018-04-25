<?php
    
    function position_get_all_candidates(){

        $position_code = $_POST['position'];

        // hard coded
        //$position_code = '0DIGB0E020180413';

        $candidates_all_array = array();

        $candidates = new WP_Query(array(
            'post_type' => 'candidate',
            'post_status' => 'publish',
            'numberposts' => -1
        ));

        // print_r($candidates);

        while ($candidates->have_posts()) {

            $candidates->the_post();
            $candidate_id = get_the_ID();

            // step through the position applied for for each candidate, and see if it's part of the current position
            // get the positions applied for Repeater field
            $positions = get_field('positions_applied', $candidate_id);

            if($positions)
            {
                while( have_rows('positions_applied', $candidate_id) ) : the_row();
        
                    if (get_sub_field('position')->post_title == $position_code){

                        $candidate_array = array(
                            'candidate_id' => $candidate_id,
                            'candidate_name' => get_field('name', $candidate_id, true),
                            'candidate_surname' => get_field('surname', $candidate_id, true),
                            'accepted' => get_sub_field('accepted')
                        );

                        $candidates_all_array[] = $candidate_array;
                        
                    }

                endwhile;

    
            }


        }

        $response = array(
            'what'=>'candidates',
            'id'=>$position_code,
            'data'=>json_encode($candidates_all_array)
         );

        $xmlResponse = new WP_Ajax_Response($response);

        $xmlResponse->send();

        // while ($positions->have_posts()) {
        //     $positions->the_post();
        //     $post_id = get_the_ID();

        //     if (get_field('open', $post_id, true) == true){

        //         $position_array = array(
        //             'position_name' => get_field('position_name', $post_id, true),
        //             'internal_description' => get_field('internal_description', $post_id, true)
        //         );

        //         $positions_array[] = $position_array;

        //     }

        // }

        // $response = array(
        //     'what'=>'intro_message',
        //     'id'=>$position,
        //     'data'=>json_encode($positions_array)
        //  );

        // $xmlResponse = new WP_Ajax_Response($response);

        // $xmlResponse->send();


    }
?>