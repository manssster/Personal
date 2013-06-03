<?php
$message = 'OK';
$return_arr = array();
$mailres = '';

function isValidEmail($email){
    return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

//validate name
if ($_POST['contactname'] == '') {
	$message = 'Please enter your name.';
	$return_arr["status"] = $message;
	$return_arr["focusfield"] = 'contactname';
	echo json_encode($return_arr);
    exit(0);
}

if(!isValidEmail($_POST['contactemail'])) {
    $message = 'Please enter a valid email address.';
	$return_arr["status"] = $message;
	$return_arr["focusfield"] = 'contactemail';
	echo json_encode($return_arr);
    exit(0);
}

if ($_POST['contactsubject'] == '') {
	$message = 'Please enter the subject.';
	$return_arr["status"] = $message;
	$return_arr["focusfield"] = 'contactsubject';
	echo json_encode($return_arr);
    exit(0);
}

if ($_POST['contactmessage'] == '') {
	$message = 'Please enter the message.';
	$return_arr["status"] = $message;
	$return_arr["focusfield"] = 'contactmessage';
	echo json_encode($return_arr);
    exit(0);
}


$to = "manssster@gmail.com";
$from = $_POST['contactemail'];
$subject = $_POST['contactsubject'];
$body = $_POST['contactemail']." - ".$_POST['contactmessage'];

$mailres = mail($to, $subject, $body);

if ($mailres == false) {
    $message = 'An Error has occurred. Unable to send message.';
    $return_arr["status"] = $message;
    echo json_encode($return_arr);
    exit(0);
}

$message = 'OK';
$return_arr["status"] = $message;
echo json_encode($return_arr);
?>
