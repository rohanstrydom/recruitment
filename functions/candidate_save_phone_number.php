<?php 

// save cell phone number
function candidate_save_phone_number(){

    $phone_number = $_POST['phone_number'];
    $position_code = $_POST['position_code'];
    //$phone_number = '0823749048';
    //$position_code = '0DIGB0E020180413';
    
    $position_object = get_page_by_title( $position_code, OBJECT, 'position' );
    
    //print_r($position_object);

    $position_name = get_field('position_name', $position_object->ID);

    //echo $position_name;

    // check if post already exist
    $candidate = get_page_by_title( $phone_number, OBJECT, 'candidate' );

    //print_r($candidate);

    // candidate already exist, so add the position being applied for
    if ( is_object($candidate)){

            echo('here<br><br>');
        
            add_position_to_candidate($candidate->ID, $position_code, $position_name);
                
            return true;
            // do nothing, as we already have the number                
    }
    else // Candidate don't exist, so create him/her
    {

        $candidate_post = array(
            'post_title' => $phone_number,
            'post_type' => 'candidate',
            'post_status' => 'publish'
        );
    
        $candidate = wp_insert_post( $candidate_post, $wp_error = true );

        update_field('phone_number',$phone_number, $candidate);
        
        print_r($candidate);

        add_position_to_candidate($candidate, $position_code, $position_name);

        return false;
        
    }

};

function add_position_to_candidate($candidate_id, $position_code, $position_name){

    $position = get_page_by_title( $position_code, OBJECT, 'position' );

    print_r($position);

    $date_time = new DateTime();
    $date_time->format('Y-m-d H:i:s');

    $row = array(
        'position_name'	=> $position_name.' - '.$position->post_title,
        'position'	=> $position
    );

    add_row( 'positions_applied', $row, $candidate_id );

}

?>