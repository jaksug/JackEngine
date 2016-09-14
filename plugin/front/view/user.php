<?php

/**
 * @author Boomer
 * @copyright 2012
 */
 $user = getUser();
?>
<div class="main">
<div class="main-title"><h4>Xpreser</h4></div>
<div class="main-content">
<?php
foreach($data as $key=>$val){
        echo '<div class="tile">';
            echo '<div class="xp_pt_gz">'.$user->profile_foto($val['xp_id'],'50').'</div>';
            echo $val['nama'].'<br />';
            echo anchor('?act=interesting&id='.$val['xp_id'],'Tambahkan');
        echo '</div>';
        }

?>
</div>
</div>