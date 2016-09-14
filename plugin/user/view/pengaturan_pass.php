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
    <form class="form-horizontal" method="post" action="<?php echo domain();?>z/user/perbarui/password/">
  
 
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password Baru</label>
    <div class="controls">
    <input type="password" name="pass" id="inputPassword" placeholder="Password">
    
    </div>
    </div>
     <div class="control-group">
    <label class="control-label" for="inputPassword">Password Ulangi</label>
    <div class="controls">
    <input type="password" name="re-pass" id="inputPassword" placeholder="Password">
    
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password Lama</label>
    <div class="controls">
    <input type="password" name="old-pass" id="inputPassword" placeholder="Password">
    
    </div>
    </div>
    <div class="control-group">
 
    <button type="submit" class="btn">Perbaharui</button>
    </div>
    </form>
    </div>
    
