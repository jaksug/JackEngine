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
    <form class="form-horizontal" method="post" action="?act=login">
    <?php echo input_token();?>
 
    <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" name="xp-log-ide" id="inputEmail" placeholder="Email">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password" name="xp-log-pass" id="inputPassword" placeholder="Password">
    
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
    <label class="checkbox">
    <input type="checkbox"> Remember me
    </label>
    <input type="hidden" name="ref" value="<?php echo $ref;?>" />
    <button type="submit" class="btn">Sign in</button>
    </div>
    </div>
    </form>
