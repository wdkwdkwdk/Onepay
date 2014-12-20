<meta charset="utf-8" />
<?php
$money = $_POST['money'];
$email = $_POST['email'];
$why = $_POST['why'];
$more = $_POST['more'];

$time = time();


include "conn.php";

$insert_sql = "INSERT INTO  shudong(mnumber,email,why,more,time) VALUES";
$insert_sql .= "('$money','$email','$why','$more','$time')";
if(mysql_query($insert_sql))
{
  $result = mysql_query("SELECT * FROM shudong WHERE time = '$time'");
  $xid = mysql_fetch_array($result);
  $xid = $xid['id'];
  $xid = "dk".$xid;
  $xid = base64_encode($xid);
}
else
{
  echo "<script>alert('失败')</script>";
  exit;
}

?>



<html>
<head>
<title>一键打赏按钮生成</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="生成支付宝打赏链接" />
    <meta name="author" content="wdk.pw" />
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<link href="http://v3.bootcss.com/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>  
</head>

<body>
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">一键打赏按钮生成</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">主页</a></li>
            <li><a href="#about">Github</a></li>
            <li><a href="http://www.wdk.pw">博客</a></li>
            <li><a href="http://meiweihezi.com">建站服务</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>绿色，方便，开源的收款主页替代方案</h1>
      </div>
      <p class="lead">
      你生成的链接为：
      <br>
      <code>
        http://meiweihezi.com/dashang.php?id=<?=$xid?>
      </code>
      <hr>
      <h2>二维码：</h2>
      <br>
      <img src="http://qr.liantu.com/api.php?text=http://meiweihezi.com/dashang.php?id=<?=$xid?>"/>
      </p>


    </div>

    <div class="footer">
      <div class="container">
        <p class="text-muted">王登科出品</p>
      </div>
    </div>
<script src="http://v3.bootcss.com/assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
