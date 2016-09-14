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
    <form class="form-horizontal" method="post" action="<?php echo domain();?>z/user/perbarui/">
    <?php echo input_token();?>
 
    <div class="control-group">
    <label class="control-label" for="inputEmail">Nama</label>
    <div class="controls">
    <input type="text" name="nama" id="inputEmail" value="<?php echo $nama;?>" placeholder="Nama">
    </div>
    </div>
     <div class="control-group">
    <label class="control-label" for="inputEmail">Nama Pengguna</label>
    <div class="controls">
    <input type="text" name="unama" id="inputEmail" value="<?php echo $xp_nama;?>" placeholder="Nama Pengguna">
    </div>
    </div>
     <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" name="email" id="inputEmail" value="<?php echo $email;?>" placeholder="Email">
    </div>
    </div>
   
    <div class="control-group">
 
    <button type="submit" class="btn">Perbaharui</button>
    </div>
     </form>
    </div>
