<?php


##DBにインサートするクラス
class insert_db{
    //DBにインサートのための変数を宣言
    private $adData;


    //コンストラクタでDBを設定し自動接続する
    public function __construct($dbuser,$dbpass,$dbhost,$dbname){
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->connect();
    }

    //DBにインサート
    public function connect(){
        $handle = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass);
        $this->handle = $handle;
        if( mysql_select_db($this->dbname,$this->handle)){
            return 'true';
        }else{
            return'false';
        }
    }
    public function getHandle(){
        return $this->handle;
    }

}

?>
