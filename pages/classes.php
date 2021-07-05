<link rel="stylesheet" type="text/css" href="home.css">
<?php

/**
 *  GETTING THE UserId/Name/Mail/Password REGISTED ON DATABASE
 */
class user
{
	private $UserId,$UserName,$UserMail,$UserPassword;

	/* FUNCTION GETTERS AND SETTER */
	public function getUserId()
	{
		return $this->UserId;
	} 
	public function setUserId($UserId)
	{
		$this->UserId=$UserId;
	}
	public function getUserName()
	{
		return $this->UserName;
	}
	public function setUserName($UserName)
	{
		$this->UserName=$UserName;
	}
	public function getUserMail()
	{
		return $this->UserMail;
	}
	public function setUserMail($UserMail)
	{
		$this->UserMail=$UserMail;
	}
	public function getUserPassword()
	{ 
		return $this->UserPassword;
	}
	public function setUserPassword($UserPassword)
	{
		$this->UserPassword=$UserPassword;
	}

	public function InsertUser(){
		include 'conn.php';
		$req = $bdd->prepare("INSERT INTO users(UserName, UserMail, UserPassword) VALUES (:UserName, :UserMail, :UserPassword)");

		$req->execute(array(
			'UserName'=>$this->getUserName(),
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
		)); 
	}
	public function UserLogin(){
		include "conn.php";
		$req=$bdd->prepare("SELECT * FROM users WHERE UserMail=:UserMail AND UserPassword=:UserPassword");

		$req->execute(array(
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
		));
		if ($req->rowCount()==0) {
			header("Location:index.php?error=1");
			return false;
		}else{
			while ($data=$req->fetch()) {
				$this->setUserId($data['UserId']);
				$this->setUserName($data['UserName']);
				$this->setUserPassword($data['UserPassword']);
				$this->setUserMail($data['UserPassword']);

				header("Location:home.php");
				return true;
			}
		}
	}
	
}

/**
 * 
  	CREATING CHAT CLASS
 */
class chat
{
	private $ChatId, $ChatUserId, $ChatText;

	public function getChatId(){
		return $this->ChatId;
	}
	public function setChatId($ChatId){
		$this->ChatId = $ChatId;
	}
	public function getChatUserId(){
		return $this->ChatUserId;
	}
	public function setChatUserId($ChatUserId){
		$this->ChatUserId = $ChatUserId;
	}
	public function getChatText(){
		return $this->ChatText;
	}
	public function setChatText($ChatText){
		$this->ChatText = $ChatText;
	}

	public function InsertChatMessage(){

		include "conn.php";

		$req = $bdd->prepare("INSERT INTO chats(ChatUserId,ChatText) VALUES(:ChatUserId, :ChatText)");
		$req->execute(array(
			'ChatUserId'=>$this->getChatUserId(),
			'ChatText'=>$this->getChatText()
		));

	}
	public function DisplayMessage(){
		include "conn.php";
		$ChatReq = $bdd->prepare("SELECT * FROM chats ORDER BY ChatId");
		$ChatReq->execute();

		while($DataChat = $ChatReq->fetch()) {
			$UserReq = $bdd->prepare("SELECT * FROM users WHERE UserId=:UserId");
			$UserReq->execute(array(
				'UserId'=>$DataChat['ChatUserId']
			));
			$DataUser = $UserReq->fetch();
			?>
			<span class="UserNameS"><?php echo $DataUser['UserName'] ;?></span><strong style="color: yellow;"> Says :</strong><br>
			<span class="UserMessageS" style="color: red; background-color: #f1f1f1; border-radius: 5px; padding: 0px; margin: 10px; border: 2px solid #dedede;"><?php echo htmlspecialchars($DataChat['ChatText']);?></span><br><br>
			<?php
		}
	}
}
?>