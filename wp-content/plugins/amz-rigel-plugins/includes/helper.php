<?php

function rigel_submit_form(){

	if ( !wp_verify_nonce( $_REQUEST['nonce'], "rigel_ajax_form_nonce")) {
		exit("No naughty business please");
	}

	global $smof_data;

	$contact_success = isset($smof_data['contact_success']) ? $smof_data['contact_success'] : '';
	$contact_error = isset($smof_data['contact_error']) ? $smof_data['contact_error'] : '';

	if(empty($contact_success)){
		$contact_success = isset($smof_data['contact_success']) ? $smof_data['contact_success'] : '<strong>Email Successfully Sent!</strong><br>Thanks for contacting Us. Your email was successfully sent and we will be in touch with you soon.';
	}

	if(empty($contact_error)){
		$contact_error = esc_html__('Please check if you have filled all the fields with valid information and try again. Thank you.','rigel' );
	}


	$yourEmailAddress = (isset($_POST['sendto']) && !empty($_POST['sendto'])) ? $_POST['sendto']  : get_option( 'admin_email'); //Put your own email address here.

	//Check to make sure that the name field is not empty
	if(trim($_POST['contactname']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['contactname']);
	}

	//Check to make sure that the subject field is not empty
	if(trim($_POST['subject']) == '') {
		$hasError = true;
	} else {
		$subject = trim($_POST['subject']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}

	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = $yourEmailAddress;
		$body = "Name: $name \n\nEmail: $email \n\nSubject: $subject \n\nMessage:\n $comments";
		$headers = array( 'Reply-To: '. $name .' <'.$email.'>' );
		wp_mail($emailTo, $subject, $body, $headers);
		echo'<div id="success" class="sent success"><p>' . $contact_success.'.</p><br></div>';
	} else { //If errors are found
		echo '<p class="error">'.$contact_error.'</p>';
	}
	die();
}

add_action("wp_ajax_rigel_submit_form", "rigel_submit_form");
add_action("wp_ajax_nopriv_rigel_submit_form", "rigel_submit_form");
