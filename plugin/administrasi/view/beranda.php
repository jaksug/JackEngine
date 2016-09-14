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
 


<div class="row-fluid" id="admin" >
 <div class=" span8">
              <div class=" page-title">
    <i class="icon-home icon-white"></i> Dashboard
</div>
              <div class="" style="height: 250px;" id="adm-block">
              	<div class="row-fluid" style="margin-bottom:15px;">
                 <a class="btn btn-box span3" href="<?php echo domain();?>administrasi/post/tambah/" data-bubble="2"><i class="icon-share-alt"></i><span>Posting</span></a>
                  <a class="btn btn-box bubble bubble-info span3 tips" data-title="bubble-info" href="<?php echo domain();?>administrasi/post/" data-bubble="2"><i class="icon-list-alt"></i><span>Artikel</span></a>
                  <a class="btn btn-box bubble bubble-success span3 tips" data-title="bubble-success" href="<?php echo domain();?>administrasi/post/kategori/" data-bubble="102"><i class="icon-th"></i><span>Kategori</span></a>
                    <a class="btn btn-box span3" href="<?php echo domain();?>administrasi/video/" data-bubble="2"><i class="icon-facetime-video"></i><span> Video</span></a>
                	               
                  </div>	
              	<div class="row-fluid" style="margin-bottom:15px;">
                <a class="btn btn-box bubble bubble-danger span3 tips" data-title="bubble-danger" href="<?php echo domain();?>administrasi/user/" data-bubble="5k"><i class="icon-user"></i><span>Pengguna</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-picture"></i><span>Galeri</span></a>
                  <a class="btn btn-box bubble bubble-warning span3 tips" data-title="bubble-warning" href="#" data-bubble="5"><i class="icon-comment"></i><span>Komentar</span></a>
                  <a class="btn btn-box span3" href="#" data-bubble="2"><i class="icon-external-link"></i><span>Plugin</span></a>

                  
              	</div>	
              </div><!--/widget-body-->
            </div>
      <div class="widget widget-padding span4">
        <div class="widget-header">
            <i class="icon-plus"></i><h5>Terbaru</h5>
            
               
           
        </div>
        <div class="widget-body">
            <ul class="nav nav-list">
            <li><a href="#">Komentar</a></li>
               <li><a href="#">Penayangan</a></li>
                  <li><a href="#">Halaman Populer</a></li>
            </ul>
        </div>
        
    </div>
</div>

