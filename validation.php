<?php

require_once('./contact_model.php');    //インポート

class Validation{
    // 氏名
    function full_name($full_name) {
        if(empty($full_name)) {
            return '*名前は必須入力です';
        } else {
            return "";
        }
    }
    // フリガナ
    function kana($kana){
        if (empty($kana)) {
            return '*フリガナは必須入力です';
        }else{
            return "";
        }
    }
    // 電話番号
    function phone($phone){
        if (empty($phone)) {
            return '*電話番号は必須入力です';
        }else if(!preg_match('/^0[7-9]0-[0-9]{4}-[0-9]{4}$/', $phone)){
            return '*正しく入力してください';
        }else{
            return "";
        }
    }
    // 生年月日
    function birth($birth){
        if (empty($birth)) {
            return '*生年月日は必須入力です';
        }elseif(!preg_match('/^[1-9]{1}[0-9]{0,3}\/[0-9]{1,2}\/[0-9]{1,2}$/', $birth)){
            return '*正しく入力してください';
        }else{
            return "";
        }
    }
    // 性別
    function gender($gender){
        if(empty($gender)){
            return '*性別は必須入力です';
        }else{
            return "";
        }
    }
    // メール
    function mail($mail){
        if (empty($mail)) {
            return '*Eメールは必須入力です';
        }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return '*正しいEメールアドレスを指定してください';
        }else{
            return "";
        }
    }
    // メール確認用
    function mail_confirm($mail_confirm){
        if (empty($mail_confirm)) {
            return '*Eメール確認用は必須入力です';
        }elseif (!filter_var($mail_confirm, FILTER_VALIDATE_EMAIL)) {
            return '*正しいEメールアドレスを指定してください';
        }else{
            return "";
        }
    }
    // メールと確認用メールが一致
    function mail_match($mail, $mail_confirm){
        if ($mail !== $mail_confirm){
            return '*Eメールアドレスが一致しません';
        }else{
            return "";
        }
    }
    // お問い合わせ内容
    function contact($contact){
        if (empty($contact)) {
            return '*お問い合わせ内容は必須入力です';
        } else {
            return "";
        }
    }
}
?>