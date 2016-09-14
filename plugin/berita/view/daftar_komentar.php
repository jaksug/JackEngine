<div class="komentar " id="daftar-komentar">
<div class="ijo" style="margin-bottom: 0;">Komentar</div>

<?php

$xp = getInstance();
foreach( $data as $d) {
    $n='';
     if($d['xp_id']=='0') {
            $n.= $d['nama'];
            $img = domain().'media/img/avatar.jpeg';
        } else {
            $n.='<a href="'.domain().'profil/'.$d['xp_nama'].'"><b>'.$d['nama'].'</b></a>';
            $img = domain().$d['aura'];
        }
    $x =  '
   
    <div class="komen-list  row-fluid">
    <div class="komen-item">
        <div class="span1"><img class="img-circle" src="'.$img.'"/>
        </div>
        <div class="span11 komen">
        ';
       
        $x.=$n;
        $x.='
            
            <div>'.$d['comment'].'</div>
        </div></div>
    </div>';
    echo $x;
}
?>
</div>