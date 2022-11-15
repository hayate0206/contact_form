<?php
	require_once('./contact_model.php');    //インポート
	require_once('./db.php');

	session_start();

	$contact_model = $_SESSION['contact_model'];
	$full_name = $contact_model->get_full_name();
	$kana = $contact_model->get_kana();
	$phone = $contact_model->get_phone();
	$birth = $contact_model->get_birth();
	$gender = $contact_model->get_gender();
	$mail = $contact_model->get_mail();
	$mail_confirm = $contact_model->get_mail_confirm();
	$contact = $contact_model->get_contact();

	$db = new Db();				//データベース接続
	$db->insert_connect_form(	//データベース登録
		$full_name, 
		$kana, 
		$phone, 
		$birth, 
		$gender, 
		$mail, 
		$mail_confirm, 
		$contact
	);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>送信完了画面</title>
</head>
<body>
	<h2>お問い合わせ完了</h2>
 	<p>お問い合わせありがとうございました。</p>
 	<p><a href="contact.php">お問い合わせフォームへ</p>
</body>
</html>