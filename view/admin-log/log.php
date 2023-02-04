<?php
    require_once "controller/gamestore/gamestorecontroller.php";
    $gs = new gamestore();
    $gs->callasset();
    $log = $gs->log();
?>
<html>
<head>
</head>
<style>
    .chooselog {
        cursor: pointer;
        color:#727272;
    }
    .chooselog:hover {
        color:#474747;
        transition: 0.2s
    }
    .logcontent:hover {
        background: #f8f8f8;
    }
</style>
    <div class="clm-12 np">
        <div class="container-full" id="daftarproduk">
            <div class="clm-12">
                <h1>Log</h1>
            </div>
            <div class="clm-12" style="border-bottom:1px solid #c9c9c9">
                <nav class="nav nav-x">
                    <ul style="padding-left:0">
                        <li onclick="AllLog()" class="chooselog">All</li>
                        <li onclick="MyLog()" class="chooselog">My Log</li>
                    </ul>
                </nav>
            </div>
            <div class="clm-12" id="showlog" style="padding-top:10">
                <?php foreach($log as $data) : ?>
                <div class="clm-12 logcontent" style="padding:5">
                    <div class="clm-12 shadow">
                        <table class="table" style="float:left; display:block">
                            <tr>
                                <td style="width:20%"><?php echo $data['tanggal_waktu_log'] ?></td>
                                <td style="width:75%"><?php echo $data['nama_log'] ?></td>
                                <td style="width:10%; text-align:right" ><?php echo $data['id_user'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>   
                <?php endforeach ?>
            </div>
        </div>
    </div>
<script>

function AllLog(){
    var showlog = document.getElementById('showlog');
    xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            showlog.innerHTML = this.response;
        }
    }
    xmlhttp.open("GET", "submit.php?alllog");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send()
}

function MyLog(){
    var showlog = document.getElementById('showlog');
    xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4){
            showlog.innerHTML = this.response;
        }
    }
    xmlhttp.open("GET", "submit.php?mylog");
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send()
}
    
</script>
</html>