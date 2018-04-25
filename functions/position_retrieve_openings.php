<?php

    // retrieve all openings
    function position_retrieve_openings(){
        
        $positions_array = array();

        $positions = new WP_Query(array(
            'post_type' => 'position',
            'post_status' => 'publish',
            'numberposts' => -1
        ));

        while ($positions->have_posts()) {
            $positions->the_post();
            $post_id = get_the_ID();

            if (get_field('open', $post_id, true) == true){

                $position_array = array(
                    'position_name' => get_field('position_name', $post_id, true),
                    'internal_description' => get_field('internal_description', $post_id, true)
                );

                $positions_array[] = $position_array;

            }

        }

        $response = array(
            'what'=>'intro_message',
            'id'=>$position,
            'data'=>json_encode($positions_array)
         );

        $xmlResponse = new WP_Ajax_Response($response);

        $xmlResponse->send();

    }

?>