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
<div class="span8"><h3 class="adm-title">Komentar</h3></div>
<div class="span4"><ul class="breadcrumb span12">
            <li><a href="<?php echo domain();?>administrasi">Dashboard</a> <span class="divider">/</span></li>
             <li class="active">Komentar</li>
        </ul></div>               
<table class="table table-striped adm-table">
        <thead>
          <tr>
            <th>#</th>
            
            <th>Penulis</th>
             <th>Komentar</th>
           
             <th>Tanggal</th>
             <th>Konten</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
      
        foreach( $data as $user ) {
    ECHO "<a href='".domain()."administrasi/user/update/'>
        <tr>
            <td>$no</td>
          
            <td>".$user['nama']."</td>
              <td>".$user['comment']."</td>
             
          <td>".$user['time']."</td>
          <td>".$user['konten']."</td>
          </tr>
        </a>";
        $no++;
        }
        ?>
          
          
        </tbody>
  </table>  
  </div>