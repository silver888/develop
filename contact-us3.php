<? include("inc/global.inc"); ?>
<? include("inc/commonSub.inc"); ?>
<? include("db_access.php"); ?>
<? include("db-insert.php"); ?>

<?php
//	print_r($adData);

//-----------------------------------------------
// DB登録
//-----------------------------------------------
function dbUpdate() {

	global $adData; //データ
	global $DB_STRING;

	// テーブル名
	$table = "form";
	// カラム
	$colums = array('id','name','mail','tel','post1','post2','prefecture','address','subject','message');


	//connect_dbクラスのインスタンスの作成
	$db = new connect_db();
	
	mysql_set_charset($db, "utf8");

	//InsertDataクラスのインスタンスの作成
	$Obj_InsertData = new InsertData();

	//インサートクエリーの作成
	$strQuery = $Obj_InsertData->SetQuery($adData,$table,$colums) ;

//	echo "SQLは　".$strQuery ;

	//connect_dbクラスのpdo関数の呼び出し
	$db->pdo($strQuery);
	
	//コネクション解放
	mysql_close($db);

	return $strMSG;
}



//------------------------------------------------
// メイン
//------------------------------------------------
//定数宣言
define("OK_URL","contact-us3.php");
define("ERR_URL","contact-us.php");
define("BACK_URL","contact-us.php?backflg=1");

if($_POST['F_Add']){

	//POSTデータ取得
	$adData = $_SESSION['S_adData'];

	//リロード対策
	if($_SESSION['send_mail'] != true ){
		//DB登録
		$message = dbUpdate();

	}else{
		//DB登録不可
		$message = "2重登録は出来ません";
	}


	if ($message <> "") {
		$_SESSION['S_message'] = $message;
		header("Location: " . ERR_URL);
		exit;
	}

	//セッションデータ削除
	unset($_SESSION["S_adData"]);

	//一覧へ
	$_SESSION["S_message_ok"] = "登録しました。";
	$_SESSION['send_mail'] = true;

//	header("Location: " . OK_URL);
//	exit;

	//バックボタン
}else if($_POST['F_Back']){

	header("Location: " . BACK_URL);
	exit;

}else{
	//セッションデータ削除
	unset($_SESSION["S_adData"]);

	header("Location: " . BACK_URL);
	exit;
}



?>
<!--header-->
<? include("inc/header.inc"); ?>
<!--/header-->
<div class="color-border"> </div>
<section id="inner-page">
  <div class="container">
    <div class="center">
      <h2>Register</h2>
		<br>
		<br>
      <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action=" ">
        <div class="col-sm-5 col-sm-offset-1">
          <div class="">
            <label>Name *</label>
            <?=$adData[name]?>
          </div>
          <div class="">
            <label>Email *</label>
            <?=$adData[mail]?>
          </div>
          <div class="">
            <label>Phone</label>
            <?=$adData[tel]?>
          </div>

        </div>
        <div class="col-sm-5">

          <div class="">
            <label>POST</label>
            <?=$adData[zip31]?> - <?=$adData[zip32]?>
          </div>

          <div class="">
            <label>PREFECTURE</label>
            <?=$PrefectureChg_ARR[$adData[prefecture]]?>
          </div>

          <div class="">
            <label>ADDRESS</label>
            <?=$adData[address]?>
          </div>

          <div class="">
            <label>Subject *</label>
            <?=$adData['subject']?>
          </div>
          <div class="">
            <label>Message *</label>
            <?=$adData['message']?>
          </div>


          <!-- 

           -->

          <div class="">

          </div>
          
        </div>
      </form>

    </div>

    <!--/.row-->

    <div class="row">
    
    </div>
    <!--/.row--> 
  </div>
  <!--/.container--> 
  <br>
  <br>
</section>
<!--/#inner-page-->

<!--header-->
<? include("inc/footer.inc"); ?>
<!--/header-->
