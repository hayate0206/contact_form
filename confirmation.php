<?php
    require_once('./contact_model.php');    //インポート
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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>お問い合わせ内容確認画面</title>
</head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>入力内容の確認</title>
    </head>
    <body>
        <form action="complete.php" method="post">
            <h2 >入力内容の確認</h2>
            <div class="contact-detail">
                <p><h3>【お名前】</h3></p>
                <?php echo $full_name;?>
            </div>
            <div class="contact-detail">
                <p><h3>【フリガナ】</h3></p>
                <?php echo $kana;?>
            </div>
            <div class="contact-detail">
                <p><h3>【電話番号】</h3></p>
                <?php echo $phone;?>
            </div>
            <div class="contact-detail">
                <p><h3>【生年月日】</h3></p>
                <?php echo $birth;?>
            </div>
            <div class="contact-detail">
                <p><h3>【性別】</h3></p>
                <?php echo $gender;?>
            </div>
            <div class="contact-detail">
                <p><h3>【メールアドレス】</h3></p>
                <?php echo $mail;?>
            </div>
            <div class="contact-detail">
                <p><h3>【お問い合わせ内容】</h3></p>
                <?php echo $contact;?>
            </div>
            <div class="contact-detail">
                <!-- 送信ボタン,戻るボタン(入力内容を保持) -->
                <p> この内容で送信しますか？</p>
                <form method="post" action="complete.php">
                <button type="submit" name="finish" value="送信">送信</button>
                <button type="button" onclick=history.back()>戻る</button>
            </div>
        </form>
    </body>
</html>
