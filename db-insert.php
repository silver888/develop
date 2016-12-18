<?php
//　DBにインサートするクラス
class InsertData {

	private $adData ;
	private $table ;
	private $colums ;

	//SQLをセット
	public function SetQuery($adData,$table,$colums){

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
				
//				echo "strQueryは　　".$strQuery."<br>";
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




?>