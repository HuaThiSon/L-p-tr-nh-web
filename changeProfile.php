<?php 
    if(session_status() == PHP_SESSION_NONE){session_start();}
    if(isset($_SESSION['accountID'])){
        $db = mysqli_connect('localhost','root','','fastfoodstore');
        $query = "SELECT * FROM account WHERE AccountID=".$_SESSION['accountID'];
        $result = mysqli_query($db, $query);
        $a = mysqli_fetch_assoc($result);
        if(isset($_POST) && isset($_POST['oldPwd'])){
            $db = mysqli_connect('localhost','root','','fastfoodstore');
            $query = "SELECT * FROM account WHERE AccountID=".$_SESSION['accountID'].' AND '.'Password="'.$_POST['oldPwd'].'"';
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) === 0){
                echo "<script type='text/javascript'>alert('Mật khẩu cho tài khoản này chưa chính xác');</script>";
            }
            else{
                if(!isset($_POST['name'])) $_POST['name'] = $a['Username'];
                if(!isset($_POST['address'])) $_POST['address'] = $a['Address'];
                if($_POST['email'] != $a['Email'])
                    $query = 'UPDATE account SET Username="'.$_POST['name'].'", Email="'.$_POST['email'].'", Address="'.$_POST['address'].'" WHERE AccountID='.$_SESSION['accountID'];
                else $query = 'UPDATE account SET Username="'.$_POST['name'].'", Address="'.$_POST['address'].'" WHERE AccountID='.$_SESSION['accountID'];
                $result = mysqli_query($db, $query);
                if(!$result){
                    echo "<script type='text/javascript'>alert('Email này đã được sử dụng! Vui lòng thử lại!');</script>";
                }
                else{                
                    if($_POST['newPwd'] && $_POST['repeatPwd'] && ($_POST['newPwd'] == $_POST['repeatPwd'])){
                        $query = 'UPDATE account SET '.'Password="'.$_POST['newPwd'].'" WHERE AccountID='.$_SESSION['accountID'];
                        $result = mysqli_query($db, $query);
                    }
                    if($result) echo "<script type='text/javascript'>alert('Các thông tin đã được cập nhật thành công');</script>";
                }
                header('Location: ');
            }
        }
    }
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
                <a href="index.html">
                    <i class="fa fa-home"></i>
                    Trang chủ
                </a>
            </li>
            <li >
                <a  class="active" href="Profile.php">
                    <i class="fa fa-user "></i>
                    Hồ sơ cá nhân
                </a>
            </li>
            
            <li>
                <a href="order.html">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    Đơn hàng</a>
            </li>
            <li >
                <a href="cart.html">
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
        <div class="col-lg-3 "></div>
        <div class="col-lg-6 ">
            <h2 class="infomation">Đổi thông tin</h2>
            <form action="changeProfile.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control" id="name" placeholder="Nhập tên của bạn" name="name" value="">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập Email" name="email" value="">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Mật khẩu cũ:</label>
                    <input type="password" class="form-control" id="oldPwd" placeholder="Nhập mật khẩu cũ" name="oldPwd" required>
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Mật khẩu mới:</label>
                    <input type="password" class="form-control" id="newPwd" placeholder="Nhập mật khẩu mới" name="newPwd">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Nhập lại mật khẩu:</label>
                    <input type="password" class="form-control" id="repeatPwd" placeholder="Nhập lại mật khẩu" name="repeatPwd" onchange="checkPass()">
                </div>
                <div id="warning" style="color: red"></div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ: </label>
                    <textarea class="form-control" id="address" name="address" placeholder="Nhập địa chỉ của bạn"></textarea>
                    
                    </div>
                    <div class="btn-submit">
                        <input  type="submit" value="Xác nhận" class="btn btn-primary btn-submit"></input>
                    </div>
                </form>
        </div>
        <div class="col-lg-3 "></div>
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
    function checkPass(){
        var pass = document.getElementById('newPwd').value;
        var repeat = document.getElementById('repeatPwd').value;
        if(pass != repeat){
            document.getElementById('warning').innerHTML = "Mật khẩu mới và mật khẩu nhập lại chưa khớp nhau";
        }
        else{
            document.getElementById('warning').innerHTML = "";
        }
    }
</script>

<?php 
    if(isset($_SESSION['accountID'])){
        $db = mysqli_connect('localhost','root','','fastfoodstore');
        $query = "SELECT * FROM account WHERE AccountID=".$_SESSION['accountID'];
        $result = mysqli_query($db, $query);
        $a = mysqli_fetch_assoc($result);
        if($result){
            echo '<script>document.getElementById("name").value = "'.$a['Username'].'";</script>';
            echo '<script>document.getElementById("email").value = "'.$a['Email'].'";</script>';
            echo '<script>document.getElementById("address").value = "'.$a['Address'].'";</script>';
        }
    }
?>

</body>
</html>