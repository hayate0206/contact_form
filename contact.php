<?php
require_once('./contact_model.php');    //インポート
require_once('./Validation.php'); 

function escape($data){      //エスケープ処理
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['input'])){       // 送信ボタンが押されたかどうか

    $full_name  = escape($_POST['full_name']);   // POSTされたデータを変数に格納
    $kana = escape($_POST['kana']);
    $phone = escape($_POST['phone']);
    $birth = escape($_POST['birth']);
    $gender = escape($_POST['gender']);
    $mail = escape($_POST['mail']);
    $mail_confirm = escape($_POST['mail_confirm']);
    $contact = escape($_POST['contact']);

    $validation = new Validation();
    $errors = $validation->allErrorData(
        $full_name, 
        $kana, 
        $phone, 
        $birth, 
        $gender, 
        $mail, 
        $mail_confirm, 
        $contact
    );
    if(count($errors) == 0){
        echo 1111;
        session_start();
        $contact_model = new ContactModel(
            $full_name, 
            $kana, 
            $phone, 
            $birth, 
            $gender, 
            $mail, 
            $mail_confirm, 
            $contact
        );
        $_SESSION['contact_model'] = $contact_model;

        header('Location: ./confirmation.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css">
<title>お問い合わせフォーム</title>
</head>
<body>
    <form action="contact.php" method="post">
        <div class="name">
<table align="center">
    <tr>
        <td>お名前<font class="hiss" color="red">必須</font></td>
        <td><input type="text" name="full_name" value="<?php if(isset($full_name)){echo $full_name;} ?>" placeholder="例）田中太郎"></td>
        <td>
            <?php
                // キーがあるかないかで判定(array_key_exists(キー, 対象の配列))
                if(isset($_POST['input']) && array_key_exists("full_name", $errors)){
                    echo '<p><font color="red">'.$errors['full_name'].'</font></p>';
                }
            ?>
        </td>
    </tr>
    <tr>
        <td>フリガナ<font class="hiss" color="red">必須</font></td>
        <td><input type="text" name="kana" value="<?php if(isset($kana)){echo $kana;} ?>" placeholder="例）タナカタロウ"></td>
        <td>
            <?php
                if(isset($_POST['input']) && array_key_exists("kana", $errors)){
                    echo '<p><font color="red">'.$errors['kana'].'</font></p>';
                }
            ?>
        </td>
    </tr>
    <td colspan="2"><hr></td>
    <tr>
        <td>電話番号<font class="hiss" color="red">必須</font></td>
        <td><input type="tel" name="phone" placeholder="例）111-2222-3333" value="<?php if(isset($phone)){echo $phone;} ?>"></td>
        <td>
            <?php
                if(isset($_POST['input']) && array_key_exists("phone", $errors)){
                    echo '<p><font color="red">'.$errors['phone'].'</font></p>';
                }
            ?>
        </td>
    </tr>
    <td colspan="2"><hr></td>
    <tr>
        <td>生年月日<font class="hiss" color="red">必須</font></td>
        <td><input type="text" name="birth" value="<?php if(isset($birth)){echo $birth;}?>" placeholder="例）2022/01/01"></td>
        <td>
            <?php
                if(isset($_POST['input']) && array_key_exists("birth", $errors)){
                    echo '<p><font color="red">'.$errors['birth'].'</font></p>';
                }
            ?>
        </td>
    </tr>
    <td colspan="2"><hr></td>
    <tr>
        <td>性別<font class="hiss" color="red">必須</font></td>
        <td>
            男<input type="radio" name="gender" value="男" checked <?php if(isset($gender)&&$gender==="男"){echo "checked";}?>>
            女<input type="radio" name="gender" value="女" <?php if(isset($gender)&&$gender==="女"){echo "checked";}?>>
        </td>
    </tr>
    <td colspan="2"><hr></td>
    <tr>
        <td>メールアドレス<font class="hiss" color="red">必須</font></td>
        <td><input type="email" name="mail" size="48" value="<?php if(isset($mail)){echo $mail;} ?>" placeholder="例）info@example.com"></td>
        <td>
            <?php
                if(isset($_POST['input']) && array_key_exists("mail", $errors)){
                    echo '<p><font color="red">'.$errors['mail'].'</font></p>';
                }
            ?>
      </td>
    </tr>
    <tr>
        <td>メールアドレス確認用<font class="hiss" color="red">必須</font></td>
        <td><input type="email" name="mail_confirm" size="48" value="<?php if(isset($mail_confirmation)){echo $confirmation;} ?>" placeholder="例）info@example.com"></td>
        <td>
            <?php
                if(isset($_POST['input']) && array_key_exists("mail_confirm", $errors)){
                    echo '<p><font color="red">'.$errors['mail_confirm'].'</font></p>';
                }
            ?>
        </td>
    </tr>
    <td colspan="2"><hr></td>
    <tr>
        <td>お問い合わせ内容<font class="hiss" color="red">必須</font></td>
        <td><textarea name="contact" cols="50" rows="5" placeholder="問題点、お困りの内容等の詳細" ><?php  if(isset($contact)){echo $contact;}?></textarea></td>
        <td>
          <?php
                    if(isset($_POST['input']) && array_key_exists("contact", $errors)){
                        echo '<p><font color="red">'.$errors['contact'].'</font></p>';
                    }
                ?>
        </td>
    </tr>
    <td colspan="2"><hr></td>
</table>
    <p><input type="submit" class="input-btn" name="input" value="入力確認" /></p>
</form>
</body>
</html>