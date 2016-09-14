<?php $xp   = getInstance(); ?>
<div id="komentar">
<p class="title">Tinggalkan Komentar</p>
<form method="post" action="<?php echo domain();?>z/berita/add_comment/<?php echo $data[0]['id'];?>">
<?php     echo input_token();?>
<div class="row-fluid">
<?php 

    if(!$xp->user->status){ 
        echo '<div class="komen-grid">Nama:<input name="x_nama"  type="text"/></div>
        <div class="komen-grid no-margin-right">Email<input name="x_email"  type="text" /></div>';
    }
?>

<textarea placeholder="Komentar" class="span12" name="x_comment" style="resize: vertical;min-height: 60px;"></textarea>
<?php 
 
    if(!$xp->user->status){ 
        ?>
  <img src="<?php echo domain();?>captcha.php" id="captcha" />
                            <a href="#" class="btn btn-warning tetep" style="margin-left: 20px;" onclick="document.getElementById('captcha').src='<?php echo domain();?>captcha.php?'+Math.random();document.getElementById('captcha-form').focus();"id="change-image"><i class="icon-refresh icon-white"></i> </a><br/>
                            Anti Spam*<br />
                            <input autocomplete="off" class="span12" placeholder="Masukan teks diatas" type="text" name="tes_robot" id="captcha-form" /><br/>
    <?php }
?>

<input class="btn pull-right" type="submit" value="Komentari" />
</div>
</form>
</div>
