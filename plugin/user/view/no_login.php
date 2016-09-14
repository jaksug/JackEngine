<style>
    #xp-log-e{
        border-color: #ddd;
        background: #ffffff;
        padding: 20px 20px 0 20px;
        margin: 100px auto -60px auto;
        min-height: 250px;
        width: 500px;
         -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.80);
	   -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.80);
			box-shadow: 0 1px 5px rgba(0, 0, 0, 0.80);
    }
    .xp-log-eh{
        border-bottom: 1px solid #e2e2e2;
        margin: 0 0 20px 0;
        padding:0 0 10px 0;
        font-size: 16px;
        font-weight: bold;
        font-family: lucida grande,tahoma,verdana,arial,sans-serif;
        float: left;
        width: 500px;
    }
    
    #xp-logg-cc{
        width: 100%;
        float: left;
    }
    
    .xp-log-ef{
        width: 250px;
        float: left;
        padding: 10px 0;
        border-right: #ccc solid 1px;
    }
    #xp-add-btn{
        float: right;
        margin: -10px 0 0 0;
    }
    .xp-no-account{
        width: 220px;
        float: left;
        padding: 10px;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 12px;
        margin: 0 -20px 0 0;
    }
    .xp-no-account h2{
        font-size: 18px;
        font-weight: normal;
        margin: -10px 0 0 0;
    }
    .xp-sgnb{
        margin: 20px 0 0 0;
        float: left;
    }
    #xp-error{
        float: left;
        width: 450px;
        margin: -10px 0 5px 0;
    }
</style>
<div id="xp-log-e">
    <div class="xp-log-eh">
        Masuk ke Xpresikan
    </div>
    <div id="xp-logg-cc">
        <div class="alert" id="xp-error">Invalid email or password?<button type="button" class="close" tutup=".alert">×</button></div>
        <div class="xp-log-ef">
        <?php echo form_open('?zona=auth&act=login');?>
            <?php echo form_input(array('name'=>'xp-log-ide','placeholder'=>'Username or Email'));?>
            <?php echo form_password(array('name'=>'xp-log-pass','class'=>'psw','placeholder'=>'Password'));?>
            <?php echo form_submit(array('class'=>'bt x-green','type'=>'submit'),'Masuk');?>
        <?php echo form_close();?>
        <a href="?">Lupa kata sandi anda?</a>
     </div>
     <div class="xp-no-account">
        <h2>No account yet?</h2>
        <div class="">Create free acount and ready to ekspressions your life</div>
        <div class="xp-sgnb">
            <a href="?act=signup" class="bt x-green" id="xp-add-btn">Mendaftar</a>
        </div>
     </div>
    </div>
</div>