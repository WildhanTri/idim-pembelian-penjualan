<?php
    if(isset($_SESSION['usercustomer'])){
        $customer = $_SESSION['usercustomer'];
        $customer_username = $_SESSION['usercustomer_username'];
        $customer_id = $_SESSION['usercustomer_id'];
        $daftarkeranjang = $gs->tampilKeranjang();
        $daftartransaksi = $gs->tampilTransaksi();
    }
?> 

<style>

    .cancelcart {
        width:10%;
        right:5px; 
        top:0px; 
        background-color:transparent; 
        color:#686868; 
        border:0px; 
        font-size:35px
    }
    .cancelcart:hover {
        color:#afafaf;
        transition: 0.1s;
    }

</style>
    <div class="header header-fixed header-public np">
        <nav class="nav nav-x nav-public">
            <ul>
                <a href="?page=home&&subpage=home"><li><img src="assets/img/gamebell.png" class="logo"></li></a>
            </ul>
            <ul style="float:right; padding-right:30px;">
                <a href="?page=shop&&subpage=catalog"><li style="padding-bottom:29px"><img src="assets/img/shop.png" style="width:35px; height:25px; float:left"><p style="float:left; padding-left:10px; font-size:20">Shop</p></li></a>
                <a onclick="showCart()"><li style="padding-bottom:29px; cursor:pointer"><img src="assets/img/tas.png" style="width:25px; height:25px; float:left"><p style="float:left; padding-left:5px; font-size:20">Cart</p></li></a>
                <a onclick="showTransaction()"><li style="padding-bottom:24px; cursor:pointer"><img src="assets/img/transaction.png" style="width:30px; height:30px; float:left"><p style="float:left; padding-left:5px; font-size:20">Transaction</p></li></a>
                <!--
                    <a href="#"><li style="padding-bottom:20px"><img src="assets/img/user-header.png" style="width:25px; height:25px;"></li></a>
                -->
                
                <a onclick="showLogin()"><li style="padding-bottom:24px; cursor:pointer"><img src="assets/img/user-header.png" style="width:25px; height:25px; "></li></a>
            </ul>
        </nav>
    </div>
    <?php
        if(isset($_SESSION['usercustomer'])) :
    ?>
    <div id="showlogin" style="width:300px; position:fixed; padding:15px; right:20px; top:70px; border:2px solid 
                #2e2d2d; background:#1e1e1e; color:white; z-index:1000; display:none">
        <div class="clm-12 np logreg" id="login">
            <table class="table" style="color:white">
                <tr>
                    <td>
                        <p style="font-size:17px;">Hi! <?php echo $_SESSION['usercustomer_username'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom:30px;">
                        <a href="?page=home&&subpage=accountsettings"><button class="btn btn-green">Account Settings</button></a>
                    </td>
                </tr>
                <tr style="">
                    <td style="text-align:right; padding:0; padding-top:15px; border-top:1px solid white">
                        <a href="submit.php?logoutcustomer"><button class="btn" style="width:100px">Log Out</button></a>
                    </td>
                </tr>
            </table>
            
        </div>
    </div>
    <?php
        else :
    ?>
    <div id="showlogin" style="width:300px; position:fixed; padding:15px; right:20px; top:70px; border:2px solid 
                #2e2d2d; background:#1e1e1e; color:white; z-index:1000; display:none">
        <div class="clm-12 np logreg" id="login">
            <form action="submit.php" method="post">
            <div class="clm-4">
                <p style="font-size:17px;">Login</p>
            </div>
            <div class="clm-8" style="text-align:right">
                <a onclick="LogReg('register')">Dont Have An Account?</a>
            </div>
            <div class="clm-12">
                <p>Username</p>
            </div>
            <div class="clm-12">
                <input type="text" class="input" name="username" placeholder="Username..." autocomplete="off" />
            </div>
            <div class="clm-12">
                <p>Password</p>
            </div>
            <div class="clm-12">
                <input type="password" class="input" name="password"placeholder="Password..." autocomplete="off" />
            </div>
            <div class="clm-8">
                <a href="#" style="text-decoration:none"><p style="color:white; text-decoration:none">Forgot Password?</p></a>
            </div>
            <div class="clm-4">
                <input type="submit" class="btn btn-green" value="Login" name="logincustomer" />
            </div>
            </form>
        </div>
        <div class="clm-12 np logreg" id="register" style="display:none">
            <form action="submit.php" method="post">
            <div class="clm-4">
                <p style="font-size:17px;">Register</p>
            </div>
            <div class="clm-8" style="text-align:right">
                <a onclick="LogReg('login')">Cancel</a>
            </div>
            <div class="clm-12">
                <p>Nama Lengkap</p>
            </div>
            <div class="clm-6">
                <input type="text" class="input" name="namadepan" placeholder="Nama Depan" autocomplete="off" />
            </div>
            <div class="clm-6">
                <input type="text" class="input" name="namabelakang" placeholder="Nama Belakang" autocomplete="off" />
            </div>
            <div class="clm-12">
                <p>Username</p>
            </div>
            <div class="clm-12">
                <input type="text" class="input" name="username" placeholder="Username..." autocomplete="off" />
            </div>
            <div class="clm-12">
                <p>Password</p>
            </div>
            <div class="clm-12">
                <input type="password" class="input" name="password" placeholder="Password..." autocomplete="off" />
            </div>
            <div class="clm-12">
                <p>Email</p>
            </div>
            <div class="clm-12">
                <input type="email" class="input" name="email" placeholder="Password..." autocomplete="off" />
            </div>
            <div class="clm-12">
                <input type="submit" class="btn btn-green" value="Register Now" name="register" />
            </div>
            </form>
        </div>
    </div>
    <?php endif ?>
    <?php if(isset($_SESSION['usercustomer'])) : ?>
     <div id="showcart" style="width:500px; height:380px; position:fixed; padding:10px 10px; right:20px; top:70px; border:5px solid 
                #2e2d2d; background:#1e1e1e; color:white; z-index:1000; display:none">
        <div class="clm-12 np" style="overflow-y:auto; height:250px">
             <?php $totalquantity = 0; $totalharga = 0 ?> 
            <?php foreach($daftarkeranjang as $keranjang) :?>
            <div class="clm-12" style="padding:3px 2px">
                <table class="table" style="color:white; background-color:#282828">
                    <tr>
                        <td rowspan="2" style="width:90px"><img src="data/data-produk/<?php echo $keranjang['id_produk']; ?>/<?php echo $keranjang['id_produk'] ?>-cover.jpg" style="height:100px; width:80px"></td>
                        <td style="width:70%"><?php echo $keranjang['nama_produk']?></td>
                        <td style="font-size:30">x<?php echo $keranjang['quantity'] ?></td>
                        <td style="width:10%"><button class="btn cancelcart" onclick="deleteCart('<?php echo $keranjang['id'] ?>')">X</button></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if($keranjang['quantity'] > 1) {
                                    echo "Rp. ".number_format($keranjang['harga_produk']*$keranjang['quantity'], 2,",",".")."<br>";
                                    echo "(Rp. ".number_format($keranjang['harga_produk'], 2,",",".")."/pcs)";
                                }else{
                                    echo "Rp. ".number_format($keranjang['harga_produk']*$keranjang['quantity'], 2,",",".");
                                }
                            ?>
                        </td>
                    </tr>
                     
                </table>
               
            </div>
            <?php $totalquantity = $totalquantity + $keranjang['quantity']; $totalharga = $totalharga + $keranjang['harga_produk']*$keranjang['quantity'] ?>
            <?php endforeach ?>
            
        </div>
         <div class="clm-12" style="height:50px">
            <div class="clm-1">
                <p style="font-size:20"><?php echo $totalquantity ?></p>
                <p style="font-size:15">Pcs</p>
            </div>
            <div class="clm-7">
                <p style="font-size:15">Total Price</p>
                <p style="font-size:20"><?php echo "Rp. ".number_format($totalharga, 2, ",",".") ?></p>
            </div>
             <div class="clm-4">
                 <a href="submit.php?prosespembelian"><button class="btn btn-green">Konfirmasi Pembelian</button></a>
            </div>
            <div class="clm-12">
                <a href="?page=home&&subpage=keranjang" style="color:white">>> Show Detail</a>
            </div>
         </div>
    </div>
    <?php else : ?>
    <div id="showcart" style="width:500px; height:100px; position:fixed; padding:10px 10px; right:20px; top:70px; border:5px solid 
                #2e2d2d; background:#1e1e1e; color:white; z-index:1000; display:none">
        <p>Anda Belum memiliki keranjang, harap <a onclick="showLogin()" style="color:#77a8d4; cursor:pointer">Login</a> terlebih dahulu</p>
    </div>
    <?php endif ?>

    <?php if(isset($_SESSION['usercustomer'])) : ?>
        <?php if($daftartransaksi != null) :?>
     <div id="showtransaction" style="width:500px; max-height:380px; position:fixed; padding:10px 10px; right:20px; top:70px; border:5px solid 
                #2e2d2d; background:#1e1e1e; color:white; z-index:1000; display:none">
        <div class="clm-12 np" style="overflow-y:auto; max-height:250px">
            <?php foreach($daftartransaksi as $data) :?>
            <a href="?page=home&&subpage=transaksi&&idtransaksi=<?php echo $data['id_transaksi'] ?>">
            <div class="clm-12" style="padding:3px 2px">
                <table class="table" style="color:white; background-color:#282828">
                    <tr>
                        <td style="width:70%"><?php echo $data['id_transaksi']?></td>
                        <td rowspan="2" style=""><?php echo $data['status'] ?></td>
                    </tr>
                    <tr>
                        <td style="padding-top:0; font-size:10"><?php echo $data['waktu_transaksi'] ?></td>
                    </tr>
                </table>
            </div>
            </a>
            <?php endforeach ?>   
        </div>
    </div>
        <?php else : ?>
    <div id="showtransaction" style="width:500px; height:100px; position:fixed; padding:10px 10px; right:20px; top:70px; border:5px solid 
                #2e2d2d; background:#1e1e1e; color:white; z-index:1000; display:none">
        <p>Tidak Ada Transaksi.</p>
    </div>
        <?php endif ?>
    
    <?php else : ?>
    <div id="showtransaction" style="width:500px; height:100px; position:fixed; padding:10px 10px; right:20px; top:70px; border:5px solid 
                #2e2d2d; background:#1e1e1e; color:white; z-index:1000; display:none">
        <p>Anda Belum memiliki keranjang, harap <a onclick="showLogin()" style="color:#77a8d4; cursor:pointer">Login</a> terlebih dahulu</p>
    </div>
    <?php endif ?>
<script>

function showLogin(){
    var showlogin = document.getElementById("showlogin");
    var showcart = document.getElementById("showcart");
    var showtransaction = document.getElementById("showtransaction");
    
    showcart.style.display = 'none';
    showtransaction.style.display = 'none';
    if(showlogin.style.display == 'none'){
        showlogin.style.display = 'block';
    }else{
        showlogin.style.display = 'none';
    }
}
    
function LogReg(page){
    var i;
    var x = document.getElementsByClassName("logreg");
    
    for(i=0; i<x.length; i++){
        x[i].style.display = "none";
    }
    document.getElementById(page).style.display = "block";
}

function showCart(){
    var showcart = document.getElementById("showcart");
    var showlogin = document.getElementById("showlogin");
    var showtransaction = document.getElementById("showtransaction");
    
    showlogin.style.display = 'none';
    showtransaction.style.display = 'none';
    if(showcart.style.display == 'none'){
        showcart.style.display = 'block';
    }else{
        showcart.style.display = 'none';
    }
}
    
function deleteCart(id){
    var xmlhttp = new XMLHttpRequest();
    var showcart = document.getElementById("showcart");
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            refreshcart();
        }
    }
    
    xmlhttp.open("GET", "submit.php?deletecart="+id);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}
    
function showTransaction(){
    var showcart = document.getElementById("showcart");
    var showlogin = document.getElementById("showlogin");
    var showtransaction = document.getElementById("showtransaction");
    
    showlogin.style.display = 'none';
    showcart.style.display = 'none';
    if(showtransaction.style.display == 'none'){
        showtransaction.style.display = 'block';
    }else{
        showtransaction.style.display = 'none';
    }
}
</script>