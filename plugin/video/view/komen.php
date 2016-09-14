  <div class="row-fluid" >
            <div class="span2">
            <img width="60" src="<?php echo domain().iavatar();?>" />
            </div>
            <div class="span10"> 
            <form id="video-komen" method="post" action="<?php echo domain();?>z/video/komen/<?php echo $id;?>">
                <textarea name="komen" class="span12"></textarea>
                <input type="submit" value="Komentari" class="btn pull-right" />
            </form>
            </div></div>