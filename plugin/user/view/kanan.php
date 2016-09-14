</div>
    <div class="span4">
        <ul class="breadcrumb">
            <li><a href="<?php echo domain();?>">Beranda</a> <span class="divider">/</span></li>
            <li><a href="<?php echo domain();?>z/user">Pengguna</a> <span class="divider">/</span></li>
            <li><a href="<?php echo domain();?>z/user/tipe/<?php echo $tipe;?>"><?php echo ucfirst($tipe);?></a> <span class="divider">/</span></li>
            <li class="active"><?php echo $nama;?></li>
        </ul>
        <?php
        $ieu = getinstance();
            $ieu->widget('auraku');
            if($tipe == 'eskul') {
                $ieu->widget('galeri');
            }
        ?>
        
    </div>
</div>  