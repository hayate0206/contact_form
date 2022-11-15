<?php
class ContactModel{
    private $full_name;
    private $kana;
    private $phone;
    private $birth;
    private $gender;
    private $mail;
    private $mail_confirm;
    private $contact;

    function __construct(
        $full_name, 
        $kana, 
        $phone, 
        $birth, 
        $gender, 
        $mail, 
        $mail_confirm, 
        $contact
    ) {
        $this->full_name = $full_name;
        $this->kana = $kana;
        $this->phone = $phone;
        $this->birth = $birth;
        $this->gender = $gender;
        $this->mail = $mail;
        $this->mail_confirm = $mail_confirm;
        $this->contact = $contact;
    }
    public function get_full_name(){
        return $this->full_name;
    }
    public function get_kana(){
        return $this->kana;
    }
    public function get_phone(){
        return $this->phone;
    }
    public function get_birth(){
        return $this->birth;
    }
    public function get_gender(){
        return $this->gender;
    }
    public function get_mail(){
        return $this->mail;
    }
    public function get_mail_confirm(){
        return $this->mail_confirm;
    }
    public function get_contact(){
        return $this->contact;
    }
}
?>