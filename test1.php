<? include("inc/global.inc"); ?>
<? include("inc/commonSub.inc"); ?>
<?php




/*

$PrefectureChg_ARR2[0]="-";
$PrefectureChg_ARR2[1]="北海道";
$PrefectureChg_ARR2[2]="青森県";

*/

$PrefectureChg_ARR2 = array(
'0'=>'未選択',
'1'=>'北海道',
'2'=>'青森',
'3'=>'秋田',
'4'=>'岩手',
'5'=>'宮城'

);

//都道府県プルダウン
function PulldownPrefec(){

	global $PrefectureChg_ARR2;
	
		echo '<select name="F_adData[prefecture]">';

	for($x=0;$x<count($PrefectureChg_ARR2);$x++){
	
		echo '<option value="'.$x.'">';
		echo $PrefectureChg_ARR2[$x];
		echo '</option>';
	
	}
		echo '</select>'; 
 }	



	
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Web Talk</title>
<meta name="description" content="">

<!-- core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/prettyPhoto.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<script src="js/address/ajaxzip3.js" charset="UTF-8"></script>




</head>
<!--/head-->


<?
PulldownPrefec();
?>



</BODY>
</HTML>
