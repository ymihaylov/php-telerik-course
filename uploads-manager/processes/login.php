<?php isset($_POST['sign-in']) OR die('Cannot direct access');

session_start();

require_once ('../includes/functions.php');
$post = array_map('trim', $_POST);

if (check_user_credentials($post))
{
	$_SESSION['is_logged'] = TRUE;
	$_SESSION['current_user'] = $post['username'];
	header('Location: ../uploads_list.php');
	exit;
}
else
{
	header('Location: ../index.php?error=1');
	exit;	
}

