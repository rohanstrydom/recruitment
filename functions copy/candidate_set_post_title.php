<?php

function candidate_set_post_title( $post ) {

    if( get_post_type() != 'candidate' )
        return;

    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        
        $("#title").prop("readonly", true); // Don't allow author/editor to adjust the title

        jQuery("#acf-field_5ad084d009e14").focusout(function(){
            $("#title-prompt-text").html(' ');
            $("#title").val($("#acf-field_5ad084d009e14").val());
            $("#title").prop("readonly", true); // Don't allow author/editor to adjust the title 
        })      
    });
    </script>
<?php
} 

?>