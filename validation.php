<?php

require_once('./contact_model.php');    //インポート

class Validation{
    // 氏名
    function full_name($full_name) {
        if(empty($full_name)) {
            return '*名前は必須入力です';
        }else if (mb_strlen($full_name) > 12) {
            return '*氏名は12文字以内でお願いします';
        } else {
            return "";
        }
    }
    // フリガナ
    function kana($kana){
        if (empty($kana)) {
            return '*フリガナは必須項目です';
        }else{
            return "";
        }
    }
    // 電話番号
    function phone($phone){
        if (empty($phone)) {
            return '*電話番号は必須項目です';
        }else if(!preg_match('/^0[7-9]0-[0-9]{4}-[0-9]{4}$/', $phone)){
            return '*正しく入力してください';
        }else{
            return "";
        }
    }
    // 生年月日
    function birth($birth){
        if (empty($birth)) {
            return '*生年月日は必須項目です';
        }elseif(!preg_match('/^[1-9]{1}[0-9]{0,3}\/[0-9]{1,2}\/[0-9]{1,2}$/', $birth)){
            return '*正しく入力してください';
        }else{
            return "";
        }
    }
    // 性別
    function gender($gender){
        if(empty($gender)){
            return '*性別は必須項目です';
        }elseif ($gender == "0" || $gender == "1"){
            return '*正しく入力してください';
        }else{
            return "";
        }
    }
    // メール
    function mail($mail){
        if (empty($mail)) {
            return '*Eメールは必須項目です';
        }elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            return '*正しいEメールアドレスを指定してください';
        }else{
            return "";
        }
    }
    // メール確認用
    function mail_confirm($mail_confirm){
        if (empty($mail_confirm)) {
            return '*Eメール確認用は必須項目です';
        }elseif (!filter_var($mail_confirm, FILTER_VALIDATE_EMAIL)) {
            return '*正しいEメールアドレスを指定してください';
        }elseif ($mail_confirm !== $mail_confirm){
            return '*Eメールアドレスが一致しません';
        }else{
            return "";
        }
    }
    // お問い合わせ内容
    function contact($contact){
        if (empty($contact)) {
            return '*お問い合わせ内容は必須項目です';
        } else {
            return "";
        }
    }

    function allErrorData($full_name,   //全てのValidation情報
        $kana, 
        $phone, 
        $birth, 
        $gender, 
        $mail, 
        $mail_confirm, 
        $contact
    ){
        $errors = [];
        if(($errorMsg = $this->full_name($full_name)) !== "")
            $errors["full_name"] = $errorMsg;
        if(($errorMsg = $this->kana($kana)) !== "")
            $errors["kana"] = $errorMsg;
        if(($errorMsg = $this->phone($phone)) !== "") 
            $errors["phone"] = $errorMsg;
        if(($errorMsg = $this->birth($birth)) !== "") 
            $errors["birth"] = $errorMsg;
        if(($errorMsg = $this->gender($gender)) !== "")
            $errors["gender"] = $errorMsg;
        if(($errorMsg = $this->mail($mail)) !== "") 
            $errors["mail"] = $errorMsg;
        if(($errorMsg = $this->mail_confirm($mail_confirm)) !== "") 
            $errors["mail_confirm"] = $errorMsg;
        if(($errorMsg = $this->contact($contact)) !== "")
            $errors["contact"] = $errorMsg;

        return $errors;
    }
}
?>