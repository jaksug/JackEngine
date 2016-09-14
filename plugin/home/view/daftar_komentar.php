<div class="komentar">
<div class="komen-atas">
<i class="icon-comment icon-white"></i> <b>Komentar</b><br />
</div>

<?php
$xp = getInstance();
foreach( $data as $d) {
    echo '<div class="row-fluid k-i"><div class="span1"><img class="span11" src="'.domain().'media/img/avatar.jpeg'.'"/></div><div class="span11 komen">
    <b>'.$d['nama'].'</b><br /><div>'.$d['comment'].'</div></div></div>';
}
?>
</div>