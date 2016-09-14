      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">Tambah Tanggapan</h3>
            </div>
            <div class="modal-body">
                <div class=" row-fluid">
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
                <div class="span8">
                <textarea class="span12" id="tanggapan"></textarea>
                <img src="captcha.php" id="captcha" />
                <a href="#" class="btn btn-warning" style="margin-left: 20px;" onclick="document.getElementById('captcha').src='captcha.php?'+Math.random();document.getElementById('captcha-form').focus();"id="change-image"><i class="icon-refresh icon-white"></i> Refresh</a><br/>
Anti Spam*<br />
<input autocomplete="off" class="span12" placeholder="Masukan teks diatas" type="text" name="tes_robot" id="captcha-form" />
                </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Batal</button>
              <button class="btn btn-warning">Reply</button>
            </div>