<?php $xp   = getInstance(); ?>
<div id="komentar">
<p class="title">Tinggalkan Komentar</p>
<form method="post" action="<?php echo domain();?>z/berita/add_comment/<?php echo $data[0]['id'];?>">
<div class="row-fluid">
<?php 
    echo input_token();
    if(!$xp->user->status){ 
        echo '<div class="komen-grid">Nama:<input name="x_nama"  type="text"/></div>
        <div class="komen-grid no-margin-right">Email<input name="x_nama"  type="text" /></div>';
    }
?>

<textarea placeholder="Komentar" class="span12" name="x_comment" style="resize: vertical;min-height: 60px;"></textarea>
<?php 
 
    if(!$xp->user->status){ 
        ?>
  
    <?php }
?>

<input class="btn pull-right" type="submit" value="Komentari" />
</div>
</form>
</div>
