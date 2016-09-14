 <div class="row-fluid">
 <div class="span4 well" id="emosi">
                <?php
          
                $img = array(
                 1=>':hmm',
                2=>':muah',
                3=>':hihi',
                4=>':hik',
                5=>'-_-',
                6=>'e',
                7=>'',
                8=>'',
                9=>'',
                10=>'',
                11=>'',
                12=>'',
                13=>'',
                14=>'',
                  28=>'<3',
                );
                foreach($img as $x=>$v){
                    echo '<img code="'.$v.'" src="img/emoticon/'.$x.'.gif"/>';
                }
                ?>
                <img src="img/01.gif" />
                </div>
                <div class="span8 well">
                <form action="?z=forum&act=tambah_thread" method="post">
                <input type="text" name="judul" />
                <?php echo input_token();?>                
                <select name="kategori">
                <?php
                foreach( $data as $x){
                    echo '<option value="'.$x['id'].'">'.$x['nama'].'</option>';
                }
                ?>?
                </select>                
                <textarea name="pos" class="span12"></textarea>
                <img src="captcha.php" id="captcha" />
                <a href="#" class="btn btn-warning" style="margin-left: 20px;" onclick="document.getElementById('captcha').src='captcha.php?'+Math.random();document.getElementById('captcha-form').focus();"id="change-image"><i class="icon-refresh icon-white"></i> Refresh</a><br/>
Anti Spam*<br />
<input autocomplete="off" class="span12" placeholder="Masukan teks diatas" type="text" name="tes_robot" id="captcha-form" />
                <button class="btn btn-warning" type="submit">Tambahkan</button>
                </form>
                </div>
</div> 