<?php

$msg = new MsgData();
$msg->content = $_POST["content"];
$msg->file = "";
if(isset($_FILES["file"])){
	$upload = new Upload($_FILES["file"]);
	if($upload->uploaded){
		$upload->Process("storage/files/");
		if($upload->processed){
			$msg->file = $upload->file_dst_name;
		}
	}
}

$msg->pacient_id = $_POST["pacient_id"];
$msg->medic_id = $_SESSION["medic_id"]; // 
$msg->kind= 2;
$msg->add();

Core::redir("./?view=openchat2&pacient_id=".$_POST["pacient_id"]);
?>