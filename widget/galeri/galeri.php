<?php
    $xp     = getinstance();
    $data   = $xp->database->rawSelect("SELECT a.id,a.title,a.url FROM galeri a  ORDER BY id DESC LIMIT 6");
?>

<div class="sisi">
    <div class="sisi-luhur">
        Foto Terpopuler<i class=" icon-th-list pull-right icon-white"></i>
    </div>
    <div class="sisi-isi">
        <ul class="nav  galeri-list"  >
        <?php
            $a = 1;
            foreach( $data as $x ) {
                $hasil = $a % 3;
                if( $hasil == 0 ){
                     echo ' <li>
                                <a data-toggle="modal" href="#myModal" rel="'.domain().'z/galeri/foto/'.$x['id'].'"  > 
                                    <img src="'.domain().$x['url'].'" class="no-margin-right"/> 
                                </a>
                            </li>'; 
                } else {
                     echo ' <li>
                                <a data-toggle="modal" href="#myModal" rel="'.domain().'z/galeri/foto/'.$x['id'].'"  > 
                                    <img src="'.domain().$x['url'].'"/> 
                                </a>
                            </li>'; 
                }
               $a++; 
            }
        ?>
        </ul>
    </div>
</div>