<?php 
    $xp = getinstance();
    if(!$xp->user->status) {
?>
        <div class="sisi">
            <div class="sisi-luhur title">
                login<i class="pull-right icon-white icon-lock"></i>
            </div>
            <div class=" log">
                <form action="<?php echo domain();?>i/login/" method="post">
                    <?php echo input_token();?>
                    <div class="row-fluid">
                        <input type="text" class="span12" name="xp-log-ide" placeholder="Nama Pengguna" />
                        <input type="password" class="span12" name="xp-log-pass" placeholder="Kata Sandi" />
                        <?php if(isset($_SESSION['tes_log']) && $_SESSION['tes_log']>= 3){ ?>
                            <img src="<?php echo domain();?>captcha.php" id="captcha" />
                            <a href="#" class="btn btn-warning tetep" style="margin-left: 20px;" onclick="document.getElementById('captcha').src='<?php echo domain();?>captcha.php?'+Math.random();document.getElementById('captcha-form').focus();"id="change-image"><i class="icon-refresh icon-white"></i> </a><br/>
                            Anti Spam*<br />
                            <input autocomplete="off" class="span12" placeholder="Masukan teks diatas" type="text" name="tes_robot" id="captcha-form" /><br/>
                        <?php } ?>
                       <a id="ke-daftar" href="<?php echo domain();?>z/user/signup/">&rarr; Daftar</a> <input type="submit" value="login" class="btn " />
                    </div>
                </form>
            </div>
        </div>
<?php 
    } 
?>