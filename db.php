<?php
require_once('./contact_model.php');    //インポート
class Db{
    private $db;
    function __construct(){     //データベース接続
        $dsn = 'mysql:host=localhost;dbname=sample_app;charset=utf8';	//DSN(Data Source Name)
        $user = 'root';
        $password = 'root';
        $this->db = new PDO($dsn, $user, $password);	//PDO(PHP Data Objects)
    }
    function insert_connect_form(    //データベース登録
        $full_name, 
        $name_kana, 
        $phone_number, 
        $birth_date, 
        $gender, 
        $mail_address, 
        $mail_address_confirm, 
        $contact_input
    ){
        try {
            // INSERT文を変数に格納
            $sql = "INSERT INTO contact_form(
                    full_name, 
                    name_kana, 
                    phone_number, 
                    birth_date, 
                    gender, 
                    mail_address, 
                    mail_address_confirm, 
                    contact_input
                )
                VALUES(
                    :full_name, 
                    :kana, 
                    :phone, 
                    :birth, 
                    :gender, 
                    :mail, 
                    :mail_confirm, 
                    :contact
                )";
            
            //prepareメソッドはプリペアドステートメントと呼ばれるものを利用するための関数です。 
            //プリペアドステートメントとは、SQL文を最初に用意しておいて、
            //その後はクエリ内のパラメータの値だけを変更してクエリを実行できる機能

            // 挿入する値は空のまま、SQL実行の準備をする
            $stmt = $this->db->prepare($sql);
    
            // // 挿入する値を配列に格納する
            $params = [
                ':full_name' => $full_name,
                ':kana' => $name_kana, 
                ':phone' => $phone_number,
                ':birth' => $birth_date,
                ':gender' => (int)$gender, 
                ':mail' => $mail_address, 
                ':mail_confirm' => $mail_address_confirm, 
                ':contact' => $contact_input
            ];
            //　SQLを実行
            $stmt->execute($params);
            
            // 登録完了
            echo '登録完了しました';
        } catch(PDOException $e) {
            // 接続エラー
            die('DB接続エラー' . $e->getMessage());
        }
    }
}
?>
