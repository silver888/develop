<? include("inc/global.inc"); ?>
<? include("inc/commonSub.inc"); ?>
<?php

// var_dump($_POST['F_adData']);

//------------------------------------------------
// メイン
//------------------------------------------------
//定数宣言
define("ERR_URL","contact-us.php");
define("BACK_URL","contact-us.php");



if($_POST['F_Add']){

	//POSTデータ取得
	$adData = $_POST['F_adData'];

	//インプットチェック
	$message = inputCheck();

	//データをセッションに格納
	$_SESSION["S_adData"] = $adData;

	if ($message <> ""){
		$_SESSION["S_message"] = $message;
		header("Location: " . ERR_URL);
		exit;
	}
	
}elseif($_POST['F_Clr']){
	//クリアボタン

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
      <h2>Confirm</h2>
		<br>
		<br>
      <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="contact-us3.php">
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
            <label>Subject </label>
            <?=$adData[subject]?>
          </div>
          
          <div class="">
            <label>Message </label>
            <?=$adData[message]?>
          </div>
          
        </div>
    </div>
  </div><!--/.container--> 
  
	<div class="button">
		<input type="submit" name="F_Add" value=" Send Mail " class="btn btn-primary btn-lg"/>
		<input type="submit" name="F_Back" value=" Back " class="btn btn-primary btn-lg"/>
	</div>
	</form>

</section>
<!--/#inner-page-->

<!--header-->
<? include("inc/footer.inc"); ?>
<!--/header-->
