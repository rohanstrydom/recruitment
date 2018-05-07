<?php

define('ACF_EARLY_ACCESS', '5');

include('functions/candidate_check_otp.php');
include('functions/candidate_save_detail.php');
include('functions/candidate_generate_save_otp.php');
include('functions/candidate_save_phone_number.php');
include('functions/candidate_save_answer_one.php');
include('functions/candidate_save_answer_two.php');
include('functions/candidate_save_answer_three.php');
include('functions/candidate_set_post_title.php');
include('functions/position_set_title.php');
include('functions/position_retrieve_intro_message.php');
include('functions/position_retrieve_openings.php');
include('functions/position_get_all_candidates.php');
include('functions/candidate_retrieve_position_answers.php');

// Set position post title to random+date
add_action( 'edit_form_after_title', 'position_set_title' ); // Set the post title for Position posts

// Set candidate post title to the user's ID
add_action( 'edit_form_after_title', 'candidate_set_post_title' ); // Set the post title for Candidate posts

add_action('wp_ajax_candidate_save_phone_number', 'candidate_save_phone_number');// for users who are logged in *** done ***
add_action('wp_ajax_nopriv_candidate_save_phone_number', 'candidate_save_phone_number');//for users that are not logged in. *** done ***

add_action('wp_ajax_candidate_save_otp', 'candidate_generate_save_otp');// for users who are logged in *** done ***
add_action('wp_ajax_nopriv_candidate_save_otp', 'candidate_generate_save_otp');//for users that are not logged in. *** done ***

add_action('wp_ajax_candidate_check_otp_otp', 'candidate_check_otp');// for users who are logged in *** done ***
add_action('wp_ajax_nopriv_candidate_check_otp', 'candidate_check_otp');//for users that are not logged in. *** done ***

add_action('wp_ajax_candidate_save_detail', 'candidate_save_detail');// for users who are logged in
add_action('wp_ajax_nopriv_candidate_save_detail', 'candidate_save_detail');//for users that are not logged in.

add_action('wp_ajax_candidate_save_answer_one', 'candidate_save_answer_one');// for users who are logged in
add_action('wp_ajax_nopriv_candidate_save_answer_one', 'candidate_save_answer_one');//for users that are not logged in.

add_action('wp_ajax_candidate_save_answer_two', 'candidate_save_answer_two');// for users who are logged in
add_action('wp_ajax_nopriv_candidate_save_answer_two', 'candidate_save_answer_two');//for users that are not logged in.

add_action('wp_ajax_candidate_save_answer_three', 'candidate_save_answer_three');// for users who are logged in
add_action('wp_ajax_nopriv_candidate_save_answer_three', 'candidate_save_answer_three');//for users that are not logged in.

add_action('wp_ajax_position_retrieve_intro_message', 'position_retrieve_intro_message');// for users who are logged in
add_action('wp_ajax_nopriv_position_retrieve_intro_message', 'position_retrieve_intro_message');//for users that are not logged in.

add_action('wp_ajax_position_retrieve_openings', 'position_retrieve_openings');// for users who are logged in
add_action('wp_ajax_nopriv_position_retrieve_openings', 'position_retrieve_openings');//for users that are not logged in.

add_action('wp_ajax_position_get_all_candidates', 'position_get_all_candidates');// for users who are logged in
add_action('wp_ajax_nopriv_position_get_all_candidates', 'position_get_all_candidates');//for users that are not logged in.

add_action('wp_ajax_candidate_retrieve_position_answers', 'candidate_retrieve_position_answers');// for users who are logged in
add_action('wp_ajax_nopriv_candidate_retrieve_position_answers', 'candidate_retrieve_position_answers');//for users that are not logged in.



?>