<meta charset="utf-8" />
<?php
$id = $_GET['id'];
$id = base64_decode($id);
$id = substr($id,2);

include "conn.php";
$result = mysql_query("SELECT * FROM shudong WHERE id ='$id' ");
$ac = mysql_fetch_array($result);
$email = $ac['email'];
$more = $ac['more'];
$mnumber = $ac['mnumber'];
$why = $ac['why'];

$sHtml = "<form id=\"submit\" name=\"submit\" action=\"https://shenghuo.alipay.com/send/payment/fill.htm\"  accept-charset=\"gbk\" id=\"dinggou\" method=\"post\" name=\"dinggou\">";
$sHtml.= "<input name=\"optEmail\" type=\"hidden\" value=".$email." />";
$sHtml.= "<input name=\"memo\" type=\"hidden\" value=".$more." />";
$sHtml.= "<input name=\"payAmount\" type=\"hidden\" value=".$mnumber." />";
$sHtml.= "<input name=\"title\" type=\"hidden\" value=".$why." />";

$sHtml = $sHtml."</form>";
$sHtml = $sHtml."<script>document.forms['submit'].submit();</script>";

echo  $sHtml;
?>
