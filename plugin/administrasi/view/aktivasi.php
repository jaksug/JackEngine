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
</style>
<div class=" row-fluid">                         
<div class="span8"><h3 class="adm-title">Belum di Aktivasi</h3><a href="<?php echo domain();?>administrasi/user/tambah" class="btn">Tambahkan</a></div>
<div class="span4"><ul class="breadcrumb span12">
            <li><a href="<?php echo domain();?>administrasi">Dashboard</a> <span class="divider">/</span></li>
             <li class="active">Aktivasi</li>
        </ul></div>               
<table class="table table-striped adm-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Nama Pengguna</th>
             <th>Email</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach( $data as $user ) {
    ECHO "<a href='".domain()."administrasi/user/update/'>
        <tr>
            <td>$no</td>
            <td><img src='".$user['aura']."'/>".$user['nama']."</td>
            <td>".$user['xp_nama']."</td>
              <td><a class='btn btn-small' href='".domain()."administrasi/user/aktifkan/".$user['xp_id']."'>Aktifkan<a></td>
            <td>".$user['level']."</td>
          
          </tr>
        </a>";
        $no++;
        }
        ?>
          
          
        </tbody>
  </table>  
  </div>