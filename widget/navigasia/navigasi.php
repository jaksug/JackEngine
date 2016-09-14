<?php
$xp = getinstance();
$id ='cat_list';
$xp->cache->set_expire(500);
if($xp->cache->valid($id)){
    $data = $xp->cache->get($id);
}
else{
    $xp->cache->hapus($id);
    $data =$xp->database->rawSelect('SELECT * from category ORDER BY name ASC');
    $xp->cache->set($id,$data);
}

?>
<div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Kategori</li>
                <?php
                    foreach( $data as $x) {
                        echo '<li><a href="?act=kategori&id='.$x['id'].'">'.ucfirst($x['name']).'</a></li>';
                    }
                ?><li class="divider"></li>
                <li><a href="?act=kategori"><i class="icon  icon-th-list"></i> Semua Kategori</a></li>
            </ul>
          </div>