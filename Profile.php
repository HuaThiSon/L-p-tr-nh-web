<?php 
    if(session_status() == PHP_SESSION_NONE){session_start();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="./afterLogin/btl.css">
  <link rel="stylesheet" href="Profile.css">

  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="./afterLogin/btl.js"></script>
</head>
<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <a href="javascript:void(0)" id="closebtn" class="mobile-visible" onclick="closeNav()">
            <i class="fa fa-arrow-left"></i>
        </a>
        <div class="sidebar-header">
            <h3>Điền tên cửa hàng dô đây</h3>
        </div>

        <ul class="list-unstyled components">

            <li>      
                <a href="./afterLogin/">
                    <i class="fa fa-home"></i>
                    Trang chủ
                </a>
            </li>
            <li >
                <a  class="active" href="Profile.html">
                    <i class="fa fa-user "></i>
                    Hồ sơ cá nhân
                </a>
            </li>
           
            <li>
                <a href="./afterLogin/order.html">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    Đơn hàng</a>
            </li>
            <li >
                <a href="./afterLogin/cart.html">
                    <i class="fa fa-shopping-cart"></i>
                    Giỏ hàng</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid content">
        <div class="btn-pd">
            <button type="button" id="sidebarCollapse" class="btn btn-info mobile-visible" onclick='openNav()'>
                <i class="fas fa-align-left"></i>
                    <span>Menu</span>
            </button>
        </div>
    
    <div class="container p-5 my-5 border">
        <div class="row">
            <div class="col-md-4  col-sm-12" >
                <img alt="avata" src="./images/huathison.jpg" class="imageChange"/>
                <div class="change-info-css">
                    <a href="" class="change-img doianh">
                        <button  type="submit" class="btn btn-primary btn-submit">Đổi ảnh</button>
                    </a>
                </div>
            </div>
            <div class="col-md-8 ">
                <h2 class="infomation">Thông tin</h2>
                <p class="Name-address">
                  <span style="font-weight: 700; ">Họ và tên :</span> <span id="name"></span>
                </p>
                <p class="Name-address address">
                  <span style="font-weight: 700;">Địa chỉ </span>: 
                  <span id=address></span>
                  <span id=nonAddress style="font-style: italic;"></span>
                </p>
                <div class="change-info-css">
                    <a href="changeProfile.php" class="change-info">
                        <button  type="submit" class="btn btn-primary btn-submit">Đổi thông tin</button>
                    </a>
                </div>

            </div>
          </div>
        
    </div>
    <script>
        const sideBar = document.getElementById('sidebar');
        const closeBtn = document.getElementById('closebtn');
        function openNav() {
            sideBar.style.width = "250px";
        }
        function closeNav() {
            sideBar.style.width = "0";
        }
    </script>
    <?php 
        if(isset($_SESSION['accountID'])){
            $db = mysqli_connect('localhost','root','','fastfoodstore');
            $query = "SELECT * FROM account WHERE AccountID=".$_SESSION['accountID'];
            $result = mysqli_query($db, $query);
            if($result){
                $a = mysqli_fetch_assoc($result);
                echo '<script>document.getElementById("name").innerHTML = "'.$a['Username'].'";</script>';
                if($a['Address']){
                    echo '<script>document.getElementById("address").innerHTML = "'.$a['Address'].'";</script>';
                    echo '<script>document.getElementById("nonAddress").innerHTML = "'."".'";</script>';
                }
                else{
                    echo '<script>document.getElementById("nonAddress").innerHTML = "'."Người dùng chưa cung cấp địa chỉ".'";</script>';
                    echo '<script>document.getElementById("address").innerHTML = "'."".'";</script>';
                } 
            }
        }
    ?>
</body>
</html>