<?php

    // name, surname, email etc.
    function position_retrieve_intro_message(){

        //$position = $_POST['position'];

        // hard coded
        $position = '0DIGB0E020180413';

        // get the candidate
        $position_object = get_page_by_title( $position, OBJECT, 'position' );

        $message = get_field('introductory_message', $position_object->ID, true);

        $response = array(
            'what'=>'intro_message',
            'id'=>$position,
            'data'=>$message
         );

        $xmlResponse = new WP_Ajax_Response($response);

        $xmlResponse->send();

        exit;

        // response example from https://codex.wordpress.org/Class_Reference/WP_Ajax_Response
        // <wp_ajax>
        //    <response action='update_intro_message_0DIGB0E020180413'>
        //        <intro_message id='0DIGB0E020180413' position='1'>
        //            <response_data>
        //                <![CDATA[Welome to the BA application.]]>
        //            </response_data>
        //            <supplemental></supplemental>
        //        </intro_message>
        //    </response>
        //</wp_ajax>
    };

?>