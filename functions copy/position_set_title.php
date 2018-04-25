<?php

    function position_set_title( $post ) {

    if( get_post_type() != 'position' || $post->post_status != 'auto-draft')
        return;


    $uniqueid_length = 8; 
    $uniqueid = crypt(uniqid(rand(),1)); 
    $uniqueid = strip_tags(stripslashes($uniqueid)); 
    $uniqueid = str_replace(".","",$uniqueid); 
    $uniqueid = strrev(str_replace("/","",$uniqueid)); 
    $uniqueid = substr($uniqueid,0,$uniqueid_length);
    $uniqueid = strtoupper($uniqueid);
    $title = $uniqueid .date( 'Ymd' );

?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#title").val("<?php echo $title; ?>");
        $("#title").prop("readonly", true); // Don't allow author/editor to adjust the title

        jQuery("#acf-field_5acf0556a4c0a").focusout(function(){ // add role name to unique identifier

            // create concatonator
            $position_title = $("#acf-field_5acf0556a4c0a").val();
            $position_title = $position_title.replace(/ /g, '_');
            $position_title = $position_title.replace(/'/g, '');

            $("#title").val(("<?php echo $title; ?>") + '_' + $position_title);
            $("#title").prop("readonly", true); // Don't allow author/editor to adjust the title 
        }) 
    });
    </script>
<?php
} 

?>