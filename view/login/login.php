<?php
    require_once "controller/base_controller.php";
    $baseController = new BaseController();
    $baseController->callasset();
    /*
    if(isset($_SESSION['user'])){
        header("../admin-home/home.php");
    }
    */
?>
<html>
    <head>
        <title>Login Admin</title>
    </head>
    <style>
        body {
            background: url('assets/img/thumb-1920-427535.jpg');
            background-size: 100% 100%;
            background-attachment: fixed;
            width: 100%;
            height: 100%;
        }
        
        .container {
            background: rgba(0,0,0,0.8);
            width: 100%;
            height: 100%;
        }
        
        .title {
            margin: auto;
            color:white;
            font-size:40px;
            font-family: raleway;
        }
        
        .bodylogin tr td {
            font-family: raleway;
            padding:5px;
        }
        
        .body-input {
            position: relative;
        }
        
        /* .body-input input { 
            border:none: background:#fff;
            display:block;
            width: 100%;
            box-sizing: border-box;
            padding-left:30px;
        } */
        .body-input img {
            padding: 4px;
            padding-left: 5px;
            position: absolute;
            left: 5px;
            width: 20px;
            height: 20px;
        }
        
        .body-input input:focus .img { 
            filter: brightness(200%);
        }
    </style>
    <body>
        <div class="container">
            <div class="clm-12" style="text-align:center; padding-top:80px; padding-bottom:40px;">
                <p class="title">Aplikasi Toko Game Online</p>
            </div>
            <div class="clm-4">
            </div>
            <div class="clm-4" style="border-top:1px solid white">
                <form action="submit.php" method="post">
                <table class="bodylogin" style="width:100%; color:white;">
                    <tr>
                        <td style="font-family:raleway">Login</td>
                    </tr>
                    <tr>
                        <td class="body-input">
                            <img src="assets/img/user.png" class="img" />
                            <input type="text" class="input" placeholder="Username..." name="username" autocomplete="off"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family:raleway">Password</td>
                    </tr>
                    <tr>
                        <td class="body-input">
                            <img src="assets/img/pw.png" class="img" />
                            <input type="password" class="input" placeholder="Password..." name="password" autocomplete="off"/>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="btn btn-blue" value="Login" name="loginadmin"></td>
                    </tr>
                </table>
                </form>
            </div>
            <div class="clm-4">
            </div>
        </div>
    </body>    
    
</html>