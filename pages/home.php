<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery.js"></script>
	<title>Welcome to MYchat</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<script type="text/javascript" src="jquery.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$("#ChatText").keyup(function(e){
				//When we press enter do
				if (e.keyCode == 13) {
					var ChatText= $("#ChatText").val();
					$.ajax({
						type:'POST',
						url:'InsertMessage.php',
						data:{ChatText:ChatText},
						success:function(){
							$("#ChatMessages").load("DisplayMessages.php");
							$("#ChatText").val("");
						}
					});
				}
			});
			
			setInterval(function(){//Refresh after 1500ms
			$("#ChatMessages").load("DisplayMessages.php");
			}, 1500);
			$("#ChatMessages").load("DisplayMessages.php");
		});
	</script>
</head>
<body>
	<center><h2 style="color: orange; font-family: tahoma; font-size: 30px;">Welcome <span><?php echo $_SESSION['UserName'];?></span></h2></center>
	<br><br>
	<div id="ChatBig">
		<div id="ChatMessages" class="scrollbar">
		</div>
		<textarea id="ChatText" name="ChatText" placeholder="Type Message..."></textarea>
	</div>
	<script type="text/javascript">
		var textarea = document.getElementById('ChatText');
		textarea.scrollTop = textarea.scrollHeight;
	</script>
</body>
</html>