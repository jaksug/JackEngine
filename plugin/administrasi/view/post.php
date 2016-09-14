<?php 
if(!defined('XP-ENGINE')) exit(NO_ACCESS);
/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
?> 

<style>
.adm-title{
    float: left;
    font-size: 25px;
    margin-right: 20px;
    margin-top: 2px;    
    font-weight:normal;        
 }
.adm-table{
    border:1px solid #ddd;
    }
 
.adm-table thead tr{
    background:#fff;
    
     
}
.adm-table tbody tr{
   padding: 20px 0!important;
     
}
</style>
<div class=" row-fluid">                         
<div class="span8"><h3 class="adm-title">Berita</h3><a href="<?php echo domain();?>administrasi/post/tambah/" class="btn">Tambahkan</a></div>
<div class="span4"><ul class="breadcrumb span12">
            <li><a href="<?php echo domain();?>administrasi">Dashboard</a> <span class="divider">/</span></li>
             <li class="active">Berita</li>
        </ul></div>               
<table class="table table-striped adm-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Penulis</th>
             <th>Kategori</th>
            <th>Komentar</th>
             <th>Tanggal</th>
             <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
      
        foreach( $data as $user ) {
    ECHO "<a href='".domain()."administrasi/user/update/'>
        <tr>
            <td>$no</td>
            <td>".$user['judul']."</td>
            <td>".$user['nama']."</td>
              <td>".$user['kategori']."</td>
            <td>0</td>
          <td>".$user['time']."</td>
          <td><ul class='list'>
                    <li><a href='".domain()."administrasi/post/edit/".$user['id']."'><i class='icon-edit'></i> Edit</a></li>
                    <li><a href='".domain()."administrasi/post/hapus/".$user['id']."'><i class='icon-remove '></i> Hapus</a></li>
                </ul></td>
          </tr>
          </tr>
        </a>";
        $no++;
        }
        ?>
          
          
        </tbody>
  </table>  
  </div>