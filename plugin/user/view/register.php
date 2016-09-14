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
#daftar{
    background: #fff;
    padding: 20px;
    margin: 0 auto;
    width: 500px;
    box-shadow: 2px 3px 10px rgba(0,0,0,0.2);
}
#daftar input{
    width: 480px;
}
#daf-in{
    border-radius: 0;
    background:  rgb(53, 155, 237);
    font-size:17px;
    color:#fff;
    margin: -21px -20px 20px -20px;
    padding: 14px 20px;
    width: 540px;
}
#daf-head{
    padding: 9px 20px!important;
    margin: -10px -20px 0px;
    font-weight: normal;
    font-size:20px;
    height: 20px;
}
#daf-head i{
    margin-top: 4px;
}
#daftar label{
    margin-top: 10px;
    font-size: 16px;
}
</style>
<div class="row-fluid">
<div id="daftar" >
<h3 id="daf-head"><i class="icon-user"></i> Pendaftaran</h3>
<hr/>
<p class="btn-block btn-large" id="daf-in">Untuk Siswa atau Almuni</p>

    <form class="form-horizontal" method="post" action="<?php echo alamat('user','daftar');?>">
    <?php echo input_token();?>
        <label for="inputEmail">Nama:</label>
        <input type="text" name="xp_f_name" id="inputEmail" placeholder="nama">
        <label  for="inputEmail">Email:</label>
        <input type="text" name="xp_surel" id="inputEmail" placeholder="Email">
        <label  for="inputPassword">Password:</label>
        <input type="password" name="xp_sandi" id="inputPassword" placeholder="Password">
        <label  for="inputPassword">Status:</label>
        <select name="status">
            <option>Pilih status anda</option>
            <option value="siswa">Siswa</option>
            <option value="alumni">Alumni</option>
        </select>
        <input type="hidden" name="ref" value="<?php echo $ref;?>" />
        <hr/>
        <button type="submit" class="btn btn-large">Daftar</button>
    </form>
</div>
</div>
</div>