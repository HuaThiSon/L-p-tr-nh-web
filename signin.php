
<?php 
    if(session_status() == PHP_SESSION_NONE){session_start();}
?>

<?php 
    echo "<script type='text/javascript'>document.getElementById('error').innerHTML='';</script>";
    if(isset($_POST['email'])){
        $db = mysqli_connect('localhost','root','','fastfoodstore');
        if(!isset($_POST['email'])) $_POST['email'] = "";
        $query = "SELECT * FROM account WHERE Email=\"".$_POST['email']."\"";
        $result = mysqli_query($db, $query);
        $a = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) !== 1){
            echo "<script type='text/javascript'>document.getElementById('error').innerHTML='Email này chưa đăng ký tài khoản';</script>";
        }
        else{
            $query = "SELECT * FROM account WHERE Email=\"".$_POST['email']."\" AND Password=\"".$_POST['password']."\"";
            $result = mysqli_query($db, $query);
            $a = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) === 0){
                echo "<script type='text/javascript'>document.getElementById('error').innerHTML='Mật khẩu chưa chính xác';</script>";
            }
            else {
                header('location: ./afterLogin');
                $_SESSION['accountID'] = $a['AccountID'];
            }
        }
    }
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Đăng nhập </title>
    <link rel="stylesheet" href="All.css" media="screen">
    <link rel="stylesheet" href="Đăng-nhập.css" media="screen">
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
          <li><a class="nav_all" href="signup.php"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
          <li  class="active" ><a class="nav_all" href="signinp.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>
        </ul>
      </div>
    </div>
  </nav>
    <section class="u-clearfix u-section-1" id="sec-41f3">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-gutter-0 u-hover-feature u-layout-wrap u-layout-wrap-1">
          <div class="u-layout" style="">
            <div class="u-layout-row" style="">
              <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-30 u-size-xs-60 u-video u-video-1" src="">
                <div class="u-background-video u-expanded" style="">
                  <div class="embed-responsive embed-responsive-1">
                    <iframe style="position: absolute;top: 0;left: 0;width: 100%;height: 100%;" class="embed-responsive-item" src="https://www.youtube.com/embed/oWGiNIzYnv8?playlist=oWGiNIzYnv8&amp;loop=1&amp;mute=1&amp;showinfo=0&amp;controls=0&amp;start=0&amp;autoplay=1" data-autoplay="1" frameborder="0" allowfullscreen=""></iframe>
                  </div>
                </div>
                <div class="u-container-layout u-container-layout-1" src="">
                  <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">NSDM Fast Food</h2>
                  <p class="u-text u-text-body-alt-color u-text-2">An toàn - Sang trọng - Tinh tế&nbsp;<br>
                    <br>Ngon - Bổ -Rẻ
                  </p>
                </div>
              </div>
              <div class="u-align-center u-container-style u-gradient u-layout-cell u-size-30 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-text u-text-body-alt-color u-text-default u-title u-text-3"><b>Welcome NSDM! </b>
                  </h1>
                  <div class="u-form u-form-1">
                    <form action="signin.php" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                      <div id="error" style="color: red;"></div>
                      <div class="u-form-email u-form-group">
                        <input type="email" placeholder="Email người dùng" id="email-0753" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-group-2">
                        <input type="password" placeholder="Mật khẩu" id="text-af64" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
                      </div>
                      <div class="u-align-left u-form-group u-form-submit">
                        <input type="submit" value="Đăng nhập" class="u-btn u-btn-submit u-button-style u-btn-2">
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
