<div class="row-fluid span12">
<?php 

    foreach($data as $komentar) {
?>
        <div class="span2">
            <img src="<?php echo domain().avatar($komentar['xp_id']);?>" />
        </div>
        <div class="span10">
        <a href="<?php echo domain();?>/profil/<?php echo $komentar['x_id'];?>"><?php echo $komentar['nama'];?></a><br />
        <?php echo $komentar['comment'];?>
        </div>
<?php
    }
?>
</div>