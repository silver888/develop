<? include("inc/global.inc"); ?>
<? include("inc/commonSub.inc"); ?>
<?php

// var_dump($_SESSION);
// print_r($_GET['backflg']);


//エラーメッセージ取得
$message = $_SESSION['S_message'];

if($message <> ""  OR $_GET['backflg'] == 1){
	//セション変数を格納
	$adData = $_SESSION["S_adData"];

}


//都道府県プルダウン
function PulldownPrefec(){
	global $PrefectureChg_ARR;

	for($x=0;$x<count($PrefectureChg_ARR);$x++){
		
		echo '<option value="'.$x.'" '.pullcheck($x,$F_search[prefecture]).'>'.$PrefectureChg_ARR[$x].'</option>';
	}

}



//セッションデータ削除
unset($_SESSION["S_adData"]);
unset($_SESSION["S_message"]);
unset($_SESSION["send_mail"]);


?>
<script src="js/address/ajaxzip3.js" charset="UTF-8"></script>

<!--header-->
<? include("inc/header.inc"); ?>
<!--/header-->

<div class="color-border"> </div>
<section id="inner-page">
  <div class="container">
    <div class="center">
      <h2>Send me a message</h2>
		<br>
		<br>
       
		<? if($message != ""){ ?>
		<div class="err">
			<ul><?= $message ?></ul>
		</div>
		<? } ?>


      <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="contact-us2.php">
        <div class="col-sm-5 col-sm-offset-1">
          <div class="form-group">
            <label>Name *</label>
            <input type="text" name="F_adData[name]" class="" value="<?= EscDspStr($adData['name']) ?>">
          </div>
          
          <div class="form-group">
            <label>Email *</label>
            <input type="text" name="F_adData[mail]" class="" value="<?= EscDspStr($adData['mail']) ?>">
          </div>

          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="F_adData[tel]" class="" value="<?= EscDspStr($adData['tel']) ?>">
          </div>

        </div>
        <div class="col-sm-5">

          <div class="form-group">
            <label>POST</label>
					<input type="text" name="F_adData[zip31]" size="4" maxlength="3"> －
					<input type="text" name="F_adData[zip32]" size="5" maxlength="4"
					onKeyUp="AjaxZip3.zip2addr('F_adData[zip31]','F_adData[zip32]','F_adData[prefecture]','F_adData[address]','F_adData[address]');">

          </div>

          <div class="" >
            <label >PREFECTURE</label>

						<select name="F_adData[prefecture]">
						<? PulldownPrefec(); ?>
						</select>

          </div>

          <div class="form-group">
            <label>ADDRESS</label>
						<input type="text" name="F_adData[address]" size="20" class="" value="<?= EscDspStr($adData['address']) ?>">
          </div>


          <div class="form-group">
            <label>Subject </label>
            <input type="text" name="F_adData[subject]" class="" value="<?= EscDspStr($adData['subject']) ?>">
          </div>
          <div class="form-group">
            <label>Message </label>
            <input type="text" name="F_adData[message]" class="" value="<?= EscDspStr($adData['message']) ?>">
          </div>
          
        </div>
    </div>
  </div><!--/.container--> 
  
	<div class="button">
		<input type="submit" name="F_Add" value=" Confirm " class="btn btn-primary btn-lg"/>
		<input type="submit" name="F_Clr" value=" Reset " class="btn btn-primary btn-lg"/>
	</div>
  </form>

</section>
<!--/#inner-page-->

<!--footer-->
<? include("inc/footer.inc"); ?>
<!--/footer-->
