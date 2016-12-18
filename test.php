<?php
include("inc/commonSub.inc");
include("db_access.php");



//　データのDBインサート
class InsertData {

	private $adData ;
	private $table ;
	private $colums ;





	//SQLをセット
	public function setsql($adData,$table,$colums){

		$strQuery = "INSERT INTO ".$table." (" ;
		//データ形式がが不正
		if(!is_array($adData)){
			return $this->strQuery = "";
		}else{

			//カラム数
			foreach($colums as $colum){

				//id以外をクエリーにセット
				if($colum != 'id'){
					$strQuery = $strQuery." ".$colum." , ";
				}
				
				echo "strQueryは　　".$strQuery."<br>";
			}

			//最後のカンマを取り除く
			$strQuery = mb_substr($strQuery,0,-2);

			$strQuery .= ") values (    ";

			//データ数
			foreach($adData as $data){
			
				if(isset($adData)){
					$strQuery = $strQuery."'".EscDbUpdateStr($data)."', ";
				}else{
					return;
				}
			
			}
			
			//最後のカンマを取り除く
			$strQuery = mb_substr($strQuery,0,-2);
			$strQuery .= ");";

			$this->strQuery = $strQuery;

			return $this->strQuery;

		}
	}
}
	//データ
	$adData = array('michel owen','08011112222','aaa@gmail.com','bbb','ccc','ddd');
	// テーブル名
	$table = "form";
	// カラム
	$colums = array('id','name','mail','tel','address','subject','message');


	//connect_dbクラスのインスタンスの作成
	$db = new connect_db();
	
	//	$obj=new System();
	$sql="SELECT * FROM form";
	//Systemクラスのpdo関数の呼び出し
	$items=$db->pdo($sql);

	

?>


<html>
<head><title>PHP TEST</title></head>
<body>

<?php
print_r($items);
?>

</body>
</html>