<?php
	include "classes.php";

	$chat = new chat();
	$chat->DisplayMessage();

	/*if (isset($_POST['ChatText'])) {
		$chat = new chat();
		$chat->setChatUserId($_SESSION['UserId']);
		$chat->setChatText($_POST['ChatText']);
		$chat->InsertChatMessage();
	}*/
?>