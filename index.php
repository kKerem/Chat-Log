<?php
define(IN_MYBB, 1);
require "../global.php";
add_breadcrumb("Chat Kaydı", "");

$Sayfa = "Chat Kaydı";

if ($mybb->user['usergroup'] == "4" || $mybb->user['usergroup'] == "8" || $mybb->user['usergroup'] == "9" || $mybb->user['usergroup'] == "42" || $mybb->user['usergroup'] == "41" || $mybb->user['usergroup'] == "40" || $mybb->user['usergroup'] == "39" || $mybb->user['usergroup'] == "38" || $mybb->user['usergroup'] == "37" || $mybb->user['usergroup'] == "36" || $mybb->user['usergroup'] == "35" || $mybb->user['usergroup'] == "34" || $mybb->user['usergroup'] == "33" || $mybb->user['usergroup'] == "32" || $mybb->user['usergroup'] == "31" || $mybb->user['usergroup'] == "30") {
    eval("\$html = \"" . $templates->get("Ust") . "\";");
    eval("\$alt = \"" . $templates->get("Alt") . "\";");
} else {
    error_no_permission();
}

output_page($html);
?>

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$aktif = $_GET['server'];

$bagla = mysql_connect("localhost", "username", "password") or die(mysql_error());
mysql_select_db("table", $bagla) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
$tablo = "table";
global $hedefSayfa;
$hedefSayfa = "log/";
$limit      = 30;

$serverlar = array(
    array(
        'id' => '0',
        'ad' => 'Tüm Sunucular'
    ),
    array(
        'id' => '1',
        'ad' => 'Mario Kart'
    ),
    array(
        'id' => '2',
        'ad' => '#2'
    ),
    array(
        'id' => '3',
        'ad' => 'Trade'
    ),
    array(
        'id' => '4',
        'ad' => 'Pre. Trade'
    ),
    array(
        'id' => '5',
        'ad' => 'Orange X7'
    ),
    array(
        'id' => '6',
        'ad' => '#2'
    ),
    array(
        'id' => '7',
        'ad' => 'Deathrun'
    ),
    array(
        'id' => '8',
        'ad' => 'Saxton Hale'
    ),
    array(
        'id' => '9',
        'ad' => 'Saxton #2'
    ),
    array(
        'id' => '10',
        'ad' => 'Jailbreak'
    ),
    array(
        'id' => '11',
        'ad' => '#2'
    ),
    array(
        'id' => '12',
        'ad' => ' Surf '
    ),
    array(
        'id' => '13',
        'ad' => 'Slender Fortress'
    ),
    array(
        'id' => '14',
        'ad' => 'Jump'
    ),
    array(
        'id' => '15',
        'ad' => 'Public'
    ),
    array(
        'id' => '16',
        'ad' => 'Medieval Wars'
    ),
    array(
        'id' => '17',
        'ad' => 'MvM'
    ),
    array(
        'id' => '18',
        'ad' => '#2'
    )
);

function aktifKim()
{
    $toplam = count($serverlar);
    global $serverlar, $aktif, $hedefSayfa;
    foreach ($serverlar as $key => $deger) {
        $aktifAd = $deger['ad'];
        if ($key == 2 || $key == 4 || $key == 6 || $key == 9 || $key == 11 || $key == 18) {
            if ($aktif == $key) {
                $yazdir = "<li><a href=\"" . $hedefSayfa . "?server=" . $deger['id'] . "\" class=\"logSunucularAktif iki\">" . $deger['ad'] . "</a></li>";
            } else {
                $yazdir = "<li><a class=\"iki\" href=\"" . $hedefSayfa . "?server=" . $deger['id'] . "\">" . $deger['ad'] . "</a></li>";
            }
        } else {
            if ($aktif == $key) {
                $yazdir = "<li><a href=\"" . $hedefSayfa . "?server=" . $deger['id'] . "\" class=\"logSunucularAktif\">" . $deger['ad'] . "</a></li>";
            } else {
                $yazdir = "<li><a href=\"" . $hedefSayfa . "?server=" . $deger['id'] . "\">" . $deger['ad'] . "</a></li>";
            }
        }
        echo $yazdir;
    }
    return $yazdir;
    return $serverAd;
}



$tabloBasla = '<table id="logTablo" cellspacing="0"><tr><td>Tarih ve Saat</td><td>Sunucu</td><td>SteamID</td><td>Oyuncu</td><td>Mesaj</td></tr>';
$tabloBitir = '</table">';


?>

<div id="govde">

<ul id="logSunucular">

<?php
aktifKim();
?>

<!--
    <li><a href="?server=0" <?php
if ($aktif == "0" || $aktif == "") {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(0);
?></a> </li>
    <li><a href="?server=1" <?php
if ($aktif == "1") {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(1);
?></a> </li>
    <li><a href="?server=3" <?php
if ($aktif == '3') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(3);
?></a> </li>
    <li><a href="?server=5" <?php
if ($aktif == '5') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(5);
?></a> </li>
    <li><a href="?server=7" <?php
if ($aktif == '7') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(7);
?></a> </li>
    <li><a href="?server=8" <?php
if ($aktif == '8') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(8);
?></a> </li>
    <li><a href="?server=10" <?php
if ($aktif == '10') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(10);
?></a> </li>
    <li><a href="?server=12" <?php
if ($aktif == '12') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(12);
?></a> </li>
    <li><a href="?server=13" <?php
if ($aktif == '13') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(13);
?></a> </li>
    <li><a href="?server=14" <?php
if ($aktif == '14') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(14);
?></a> </li>
    <li><a href="?server=17" <?php
if ($aktif == '17') {
    echo "class='logSunucularAktif'";
}
?>><?php
echo aktifKim(17);
?></a> </li>
-->
     <form class="logIcindeAra" name="form1" action="log/?server=<?php
echo $aktif;
?>&ara=<?php
echo $_POST["ara"];
?>" method="post" id="logArama">
        <input type="text" name="ara" placeholder="Kelime, SteamID vs." value="<?php
if (!empty($_POST["ara"]))
    echo $_POST["ara"];
?>">
        <input type="submit" value="Filtrele" name="gonder">     
    </form>
    
    <div class="sil"></div>
</ul>

<!--<div id="logFiltreleme">
    <form  method="get" action="test.php?server=<?php
echo $aktif;
?>&sayfa=<?php
echo $sayfa;
?>&sirala">
    <select name="kayitSirala">
        <option value="son2saat">Son 2 saatlik kaydı</option
        <option>Son 4 saatlik kaydı</option>
        <option>Son 8 saatlik kaydı</option>
        <option>Son 12 saatlik kaydı</option>
        <option>Son 1 günlük kaydı</option>
        <option>Son 3 günlük kaydı</option>
        <option>Son 1 haftalık kaydı</option>
    </select>
    <select>
        <option>Sondan başa</option>
        <option>Baştan sona</option>
    </select>
    <input type="submit" value="Sırala">
    </form>
    
   
    
    <div class="sil"></div>
</div>
    <br>-->
    
    <br>
    
<?php

switch ($_GET['server']) {
    
    case $aktif:
        
        $sifirKontrol = "";
        
        if ($aktif == 0) {
            $sifirKontrol = "WHERE team=1 OR team=2 OR team=3 ORDER BY seqid DESC";
        } else {
            $sifirKontrol = "WHERE srvid=$aktif AND (team=3 OR team=1 OR team=2) ORDER BY seqid DESC";
        }
        
        $query       = "SELECT COUNT(*) as num FROM $tablo $sifirKontrol";
        $toplamSayfa = mysql_fetch_array(mysql_query($query));
        $toplamSayfa = $toplamSayfa['num'];
        $sayfaAsama  = 3;
        $sayfa       = mysql_escape_string($_GET['sayfa']);
        if ($sayfa) {
            $sayfaBasla = ($sayfa - 1) * $limit;
        } else {
            $sayfaBasla = 0;
        }
        if ($_POST) {
            $ara = $_POST["ara"];
            if (!empty($ara)) {
                $query1 = "SELECT * FROM $tablo where name like '%$ara%' LIMIT $sayfaBasla, $limit";
            }
        } else {
            $query1 = "SELECT * FROM $tablo $sifirKontrol LIMIT $sayfaBasla, $limit";
        }
        
        $result = mysql_query($query1);
        
        if (!empty($result)) {
            echo '<table id="logTablo" cellspacing="0">
    <tr>
        <td>Tarih ve Saat</td>
        <td>Sunucu</td>
        <td>SteamID</td>
        <td>Oyuncu</td>
        <td>Mesaj</td>
    </tr>';
        }
        while ($yaz = mysql_fetch_array($result)) {
            if ($yaz["srvid"] == 1)
                $sid = "Mario Kart";
            if ($yaz["srvid"] == 2)
                $sid = "Mario Kart #2";
            if ($yaz["srvid"] == 3)
                $sid = "Trade";
            if ($yaz["srvid"] == 4)
                $sid = "Premium Trade";
            if ($yaz["srvid"] == 5)
                $sid = "Orange X7";
            if ($yaz["srvid"] == 6)
                $sid = "Orange X7 #2";
            if ($yaz["srvid"] == 7)
                $sid = "Deathrun";
            if ($yaz["srvid"] == 8)
                $sid = "Saxton Hale";
            if ($yaz["srvid"] == 9)
                $sid = "Saxton Hale #2";
            if ($yaz["srvid"] == 10)
                $sid = "Jailbreak";
            if ($yaz["srvid"] == 11)
                $sid = "Jailbreak #2";
            if ($yaz["srvid"] == 12)
                $sid = "Surf";
            if ($yaz["srvid"] == 13)
                $sid = "Slender Fortress";
            if ($yaz["srvid"] == 14)
                $sid = "Jump";
            if ($yaz["srvid"] == 15)
                $sid = "Public";
            if ($yaz["srvid"] == 16)
                $sid = "Medieval Wars";
            if ($yaz["srvid"] == 17)
                $sid = "MvM #1";
            if ($yaz["srvid"] == 18)
                $sid = "MvM #2";
            if ($yaz["team"] == 1) {
                $nick = '<font color="#fdfdfd">' . $yaz["name"] . '</font>';
            } else if ($yaz["team"] == 2) {
                $nick = '<font color="red">' . $yaz["name"] . '</font>';
            } else if ($yaz["team"] == 3) {
                $nick = '<font color="blue">' . $yaz["name"] . '</font>';
            } else {
                $nick = "Server";
            }
            if ($nick == "Server") {
                $konsol = "Console";
                echo '<tr><td>' . $yaz["date"] . '</td><td>' . $sid . '</td><td>' . $konsol . '</td><td>' . $nick . '</td><td>' . $yaz["text"] . '</td></tr>';
            } else {
                echo '<tr><td>' . $yaz["date"] . '</td><td>' . $sid . '</td><td>' . $yaz["steamid"] . '</td><td>' . $nick . '</td><td>' . $yaz["text"] . '</td><td class="logEylem"><a class="pagination_page" href="#" original-title="Banla"><i class="fa fa-user-times fa-fw"></i></a>  <a class="pagination_page" href="#" original-title="Mute veya Gag"><i style="font-size: 14px;" class="fa fa-microphone-slash fa-fw"></i></a></td></tr>';
            }
            
            $yaz["type"];
        }
?>
</table>
<?php
        if ($sayfa == 0) {
            $sayfa = 1;
        }
        $prev       = $sayfa - 1;
        $next       = $sayfa + 1;
        $sonSayfa   = ceil($toplamSayfa / $limit);
        $sonSayfam1 = $sonSayfa - 1;
        
        $sayfalama = '';
        if ($sonSayfa > 1) {
            $sayfalama .= "<div class='sayfalama'>";
            if ($sayfa > 1) {
                $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$prev'><i class='fa fa-arrow-circle-left' aria-hidden='true'></i>  Önceki</a> ";
            } else {
                $sayfalama .= "";
            }
            
            if ($sonSayfa < 7 + ($sayfaAsama * 2)) {
                for ($sayfaSayma = 1; $sayfaSayma <= $sonSayfa; $sayfaSayma++) {
                    if ($sayfaSayma == $sayfa) {
                        $sayfalama .= "<span class='pagination_current'>$sayfaSayma</span>";
                    } else {
                        $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sayfaSayma'>$sayfaSayma</a> ";
                    }
                }
            } elseif ($sonSayfa > 5 + ($sayfaAsama * 2)) {
                if ($sayfa < 1 + ($sayfaAsama * 2)) {
                    for ($sayfaSayma = 1; $sayfaSayma < 4 + ($sayfaAsama * 2); $sayfaSayma++) {
                        if ($sayfaSayma == $sayfa) {
                            $sayfalama .= "<span class='pagination_current'>$sayfaSayma</span>";
                        } else {
                            $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sayfaSayma'>$sayfaSayma</a> ";
                        }
                    }
                    $sayfalama .= " ... ";
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sonSayfam1'>$sonSayfam1</a> ";
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sonSayfa'>$sonSayfa</a> ";
                } elseif ($sonSayfa - ($sayfaAsama * 2) > $sayfa && $sayfa > ($sayfaAsama * 2)) {
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=1'>1</a> ";
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=2'>2</a> ";
                    $sayfalama .= " ... ";
                    for ($sayfaSayma = $sayfa - $sayfaAsama; $sayfaSayma <= $sayfa + $sayfaAsama; $sayfaSayma++) {
                        if ($sayfaSayma == $sayfa) {
                            $sayfalama .= "<span class='pagination_current'>$sayfaSayma</span>";
                        } else {
                            $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sayfaSayma'>$sayfaSayma</a> ";
                        }
                    }
                    $sayfalama .= " ... ";
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sonSayfam1'>$sonSayfam1</a> ";
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sonSayfa'>$sonSayfa</a> ";
                } else {
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=1'>1</a> ";
                    $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=2'>2</a> ";
                    $sayfalama .= " ... ";
                    for ($sayfaSayma = $sonSayfa - (2 + ($sayfaAsama * 2)); $sayfaSayma <= $sonSayfa; $sayfaSayma++) {
                        if ($sayfaSayma == $sayfa) {
                            $sayfalama .= "<span class='pagination_current'>$sayfaSayma</span>";
                        } else {
                            $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$sayfaSayma'>$sayfaSayma</a> ";
                        }
                    }
                }
            }
            
            if ($sayfa < $sayfaSayma - 1) {
                $sayfalama .= "<a class='pagination_page' href='$hedefSayfa?server=$aktif&sayfa=$next'>Sonraki  <i class='fa fa-arrow-circle-right' aria-hidden='true'></i></a> ";
            } else {
                $sayfalama .= "";
            }
            
            $sayfalama .= "</div>";
        }
?>

<br>

<div id="forumustGovde" class="logforumustGovde" style="float:right">
    <div class="pagination">
<?php
        echo $sayfalama;
?>
   </div>
</div><br><br>
<?php
        break;
}
?>
   
    
    <?php
output_page($alt);

?>
