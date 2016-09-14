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
#set-layout{
    background: #ddd;
    padding: 20px;
    margin-top: 100px;
}</style>
<div id="set-layout">
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo domain();?>z/user/perbarui/profil/">
    <?php echo input_token();?>
    <?php echo $nama;?>
    <img src="<?php echo domain().$aura;?>"/>
     <div class="control-group">
    <label class="control-label" for="inputEmail">Foto Profil</label>
    <div class="controls">
    <input type="file" name="foto" />
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Portopolio</label>
    <div class="controls">
    <textarea name="tentang" placeholder="Tentang anda ..... "style="width: 620px; min-height: 100px; resize: vertical;"><?php echo $tentang;?></textarea>
    </div>
    </div>
    <div class="control-group">
 
    <button type="submit" class="btn">Perbaharui</button>
    </div>
   
    </form>
</div>