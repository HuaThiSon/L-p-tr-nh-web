<?php 
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
        $db = mysqli_connect('localhost','root','','fastfoodstore');
        $query = "INSERT INTO account(Username, Email, Password) VALUES (\"".$_POST['name']."\", \"".$_POST['email']."\", \"".$_POST['password']."\")";
        $result = mysqli_query($db, $query);
        if(!$result)
            echo "<script type='text/javascript'>alert('Email này đã được sử dụng! Vui lòng nhập lại!');</script>";
        else header('Location: signin.php');
    }
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Đăng ký </title>
    <link rel="stylesheet" href="All.css" media="screen">
    <link rel="stylesheet" href="Đăng-ký.css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./font/fontawesome-free-5.15.3-web/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body class="u-body u-overlap"><header class="u-clearfix u-header u-header" id="sec-8d35">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="nav_all" href="index.html">Trang chủ</a></li>
          <li  class="active" ><a class="nav_all" href="signup.php"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
          <li><a class="nav_all" href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <section class="u-clearfix u-section-1" id="sec-347f">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="">
            <div class="u-layout-row" style="">
              <div class="u-align-left u-container-style u-image u-layout-cell u-left-cell u-shading u-size-30 u-size-xs-60 u-image-1" src="" data-image-width="1280" data-image-height="853" >
                <div class="u-container-layout u-container-layout-1" src="">
                  <h2 class="u-text u-text-default u-text-1">NSDM Fast Food</h2>
                  <p class="u-text u-text-2">An toàn - Sang trọng - Tinh tế&nbsp;<br>
                    <br>Ngon - Bổ -Rẻ
                  </p>
                </div>
              </div>
              <div class="u-align-center u-container-style u-gradient u-layout-cell u-size-30 u-layout-cell-2" >
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-text u-text-default u-title u-text-3"><b>Đăng ký tài khoản tại NSDM!</b>
                  </h1>
                  <div class="u-form u-form-1">
                    <form action="signup.php" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <!-- <label for="name-0753" class="u-form-control-hidden u-label"></label> -->
                        <input type="text" placeholder="Họ tên người dùng" id="name-0753" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-email u-form-group">
                        <!-- <label for="email-0753" class="u-form-control-hidden u-label"></label> -->
                        <input type="email" placeholder="Email người dùng" id="email-0753" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-group-3">
                        <!-- <label for="text-af64" class="u-form-control-hidden u-label"></label> -->
                        <input type="password" placeholder="Mật khẩu" id="text-af64" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                      </div>
                      <div class="u-form-agree u-form-group u-form-group-4">
                        <input type="checkbox" id="agree-3ccd" name="agree" class="u-agree-checkbox" required="">
                        <label for="agree-3ccd" class="u-label">I accept the <a href="#">Terms of Service</a>
                        </label>
                      </div>
                      <div class="u-align-left u-form-group u-form-submit">
                        <input type="submit" value="Đăng ký" class="u-btn u-btn-submit u-button-style u-btn-2">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>

