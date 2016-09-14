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
input.span12{
    padding: 8px 20px;
    height: 44px!important;
}
</style>
<div class=" row-fluid">                         
<div class="span8"><h3 class="adm-title">Video</h3></div>
<div class="span4"><ul class="breadcrumb span12">
            <li><a href="<?php echo domain();?>administrasi">Dashboard</a> <span class="divider">/</span></li>
             <li class="active">Video</li>
        </ul></div>   

<div>
<form method="POST" action="<?php echo domain();?>administrasi/video/tambah/">
<div class="span4">
<h3 class="adm-title">Tambah Video</h3><br /><br />
<input type="submit" class="btn" value="Tambahkan" />
</div>
<div class="span8">
    
        <input class="span12" name="title" type="text" placeholder="Judul" /><br />
       <input class="span12" name="video" type="text" placeholder="Youtube Id" /> 
    
</div>
</form>
</div>            
<table class="table table-striped adm-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
             <th>Kategori</th>
            <th>Oleh</th>
             <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
      
        foreach( $data as $user ) {
            $id = $user['id'];
    ECHO "<a href='".domain()."administrasi/user/update/'>
        <tr>
            <td>$no</td>
            <td><img width='60' src='http://img.youtube.com/vi/".$user['youtube_id']."/1.jpg'/>".$user['title']."</td>
            <td>".$user['watch']."</td>
              <td></td>
            <td> <ul class='nav nav-pills'>
                    <li><a href='#'><i class='icon-edit'></i> Edit</a></li>
                    <li><a href='".domain()."administrasi/video/hapus/$id'><i class='icon-remove '></i> Hapus</a></li>
                </ul></td>
         
          </tr>
        </a>";
        $no++;
        }
        ?>
          
          
        </tbody>
  </table>  
  </div>