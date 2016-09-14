<?php $xp   = getInstance(); ?>
<div class="hero-unit">
<form method="post" action="?z=berita&act=add_comment&id=<?php echo $data[0]['id'];?>">
<?php if(!$xp->user->status){ echo 'Nama:<br /><input name="x_nama" class="span12" type="text" />';}?>
Komentar*
<textarea placeholder="Komentar" class="span12" name="x_comment" style="resize: vertical;min-height: 60px;"></textarea>
<img src="captcha.php" id="captcha" />
<a href="#" class="btn btn-warning" style="margin-left: 20px;" onclick="document.getElementById('captcha').src='captcha.php?'+Math.random();document.getElementById('captcha-form').focus();"id="change-image"><i class="icon-refresh icon-white"></i> Refresh</a><br/>
Anti Spam*<br />
<input autocomplete="off" class="span12" placeholder="Masukan teks diatas" type="text" name="tes_robot" id="captcha-form" /><br/><input class="btn" type="submit" value="Komentari" />
</form>
</div>