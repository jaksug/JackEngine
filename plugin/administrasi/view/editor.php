<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * This file have many function for all node in xp-engine
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright Jaka Suganda
 * @package Positive Engine 1.0
 * --------------------------------------------------------------------------------------
 */
 
$core = getInstance(); 
$core->load->helper(array('url','html'));

?>
<style>
.adm-post-title{
    font-weight: normal;
    font-size: 20px;
    float: left;
    margin-right: 40px;
}
.adm-post-title .icon-pencil{
    margin-right: 7px;
    margin-top: 4px;
}
</style>

<link rel="stylesheet" type="text/css" href="<?php echo domain();?>/media/src/bootstrap-wysihtml5.css"></link>


<form action="<?php echo domain();?>administrasi/post/submit/" method="post" id="je-artikel">
    <div class="row-fluid">
        <h2 class="heading">
            <h2 class="adm-post-title"><i class="icon-pencil"></i>Posting</h2><input name="je-judul" type="text" placeholder="Masukan judul..."  class="input-xxlarge x"  /> 
            <div class="btn-group pull-right">
                <input type="submit" name="publish" value="Bagikan" class="btn"/>
                <button class="btn"><i class="icon-arrow-right"></i> Preview</button>
                <input type="submit" name="publish" value="Simpan Draft" class="btn"/>
            </div>
        </h2>
    </div>
    <div class="konten row-fluid">
        <div >
            
            </div>
           
		<textarea class=" textarea span8" name="je-berita" placeholder="Enter text ..." ></textarea>
<div class="span4 pull-right">
<select name="kategori">
<?php
    foreach($data as $kategori) {
        echo '<option value="'.$kategori['id'].'">'.$kategori['name'].'</option>';
    }
?>
</select>
</div>

        </div>
    
    </div>
</form>
<script src="<?php echo domain();?>/media/lib/js/wysihtml5-0.3.0.js"></script>

<script src="<?php echo domain();?>/media/lib/js/prettify.js"></script>

<script src="<?php echo domain();?>/media/src/bootstrap-wysihtml5.js"></script>
<style> .wysihtml5-sandbox{
        height: 350px!important;
        resize: vertical!important;
    }</style>
<script>
	$('.textarea').wysihtml5();
    $('.textarea img').on('click',function(){
        alamat('a');
    });
</script>

<script type="text/javascript" charset="utf-8">
	$(prettyPrint);
    
    $('.img-menu a').click(function(e){
        e.preventDefault();
        var x ="<?php echo domain();?>";
        var forobj = $(this).attr('href');
       
        if(forobj==1){
            $.ajax({
                type: "GET",
                url: x+'administrasi/galeri/get_all',
                dataType: "json",
                cache:true,
                success: function(data){ 
                     $.each(data.konten, function(index, element) {
                        
        $('#img-content').append("<img src='"+x+element.link+"'/>");
    });
                }
            });
        } else {
            $('.img-area').empty().append('<form name="frm" method="post" enctype="multipart/form-data" target="media-upload" onsubmit="uploadGambar();" action="upload.php">Pilih Gambar : <input name="gambar" type="file" /><input type="submit" name="upload" value="Upload Gambar" />\</form><div id="tampil-gambar"></div><iframe name="media-upload" id="media-upload" style="display:none;"></iframe>');
        }
   
       
    });
    
  $(document).on('click', 'img', function(){
    
    $('.img-active').removeClass('img-active');
 $(this).addClass('img-active');
    $('.bootstrap-wysihtml5-insert-image-url').val($(this).attr('src'))
});

function uploadGambar(){
	$("#tampil-gambar").html("<img src='loading.gif'> Gambar sedang di-upload...");
}
function tampilkanGambar(alamat){
	var gbr = new Image();
	$(gbr).load(function(){
		$(this).hide();
		$("#tampil-gambar").html($(this));
		$(this).fadeIn();
	}).attr('src', alamat)
	.error(function(){
		alert("Tidak berhasil mengambil gambar");
	});
}
s(document).on('click', '.wysihtml5-editor img', function(){
   $(this).attr('width','20');
});
</script>