
    </div>
    <div class="span4">
        <ul class="breadcrumb span12">
            <li><a href="<?php echo domain();?>">Beranda</a> <span class="divider">/</span></li>
            <li><a href="<?php echo domain();?>z/video">Video</a> <span class="divider">/</span></li>
            <li class="active"><?php echo $title;?></li>
        </ul>
        <?php
            $ieu = getinstance();
            $ieu->widget('video');
            $ieu->widget('video_terbaru');
        ?>
    </div>
</div>  
