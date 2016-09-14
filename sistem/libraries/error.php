<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

class XP_Error{
    function not_found()
    {
        $xp =getInstance();
        $xp->status =false;
        echo '<style>
                    h1 {
                        font-weight: bold;
                        font-size: 16px;
                        font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
                        color: #990000;
                        margin:	0 0 4px 0;
                    }
                    .xp_lhddgs12{
                        border-top: solid 1px #e3e3e3;
                        margin:-5px 0 10px 0;
                        font-size: 13px;
                    }
                    .xp_jbxsuy{
                        margin:0 0 10px 0;
                        padding: 5px 0 0 0;
                    }
            </style>
	       <div id="content">
                <h1>Halaman tidak ditemukan</h1>
                <div class="xp_lhddgs12">
		              <div class="xp_jbxsuy">
                            Nampaknya halaman yang Anda minta tidak ditemukan. Mungkin tautan sudah kadaluarsa 
                            atau salah memasukan alamat.
                      </div>
                    <ul>
                        <li><a class="xp-n" href="'.domain().'">Kembali ke Beranda</a></li>
                        <li><a href="/a">Ke halaman sebelumnya</a></li>
                    </ul>
                </div> 
            </div>';
    }
    
    function _404(){
        $xp = getInstance();
         $xp->status =false;
          echo '<style>
                    h1 {
                        font-weight: bold;
                        font-size: 16px;
                        font-family:"lucida grande",tahoma,verdana,arial,sans-serif;
                        color: #990000;
                        margin:	0 0 4px 0;
                    }
                    .xp_lhddgs12{
                        border-top: solid 1px #e3e3e3;
                        margin:-5px 0 10px 0;
                        font-size: 13px;
                    }
                    .xp_jbxsuy{
                        margin:0 0 10px 0;
                        padding: 5px 0 0 0;
                    }
                    #content{
                        background: #f5f5f5;
                        width: 600px;
                        margin:100px auto 0 auto;
                        padding: 10px;
                        border-radius: 5px;
                        border: 1px solid #d3d3d3;
                    }
            </style>
	       <div id="content">
                <h1>Halaman tidak ditemukan</h1>
                <div class="xp_lhddgs12">
		              <div class="xp_jbxsuy">
                            Nampaknya halaman yang Anda minta tidak ditemukan. Mungkin tautan sudah kadaluarsa 
                            atau salah memasukan alamat.
                      </div>
                    <ul>
                        <li><a href="'.''.'">Kembali ke Beranda</a></li>
                        <li><a href="/a">Ke halaman sebelumnya</a></li>
                    </ul>
                </div> 
            </div>';
    }
    
    function fatal_error($header,$message)
    {
        $html = '<html>
                    <head>
                        <title>Error</title>
                        <style type="text/css">
                            body {
                            background-color:	#fff;
                            margin:				40px;
                            font-family:		Lucida Grande, Verdana, Sans-serif;
                            font-size:			12px;
                            color:				#000;
                            }
                            #content  {
                                border:				#999 1px solid;
                                background-color:	#fff;
                                padding:			20px 20px 12px 20px;
                                width: 500px;
                                border: 1px solid #b3b3b3;
                                border-radius: 4px; margin: 0 auto; 
                                box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff; 
                                background: #fcfcfc;
                            }
                            .xp_hcmp{
                                border-top: 1px solid #b3b3b3;
                                padding :10px 0;
                                margin: 10px 0 0 0;
                            }
                            h1 {
                                font-weight:		normal;
                                font-size:			14px;
                                color:				#990000;
                                margin:				0 0 4px 0;
                            }
                        </style>
                    </head>
                    <body>
                   	    <div id="content">
                      		<h1>'.$header.'</h1>
                      		<div class="xp_hcmp">'.$message.'</div>'.
                            'Page randerer on '.script_time().' seconds
                        	</div>
                    </body>
                </html>';
    echo $html;
    }
    
    function ekstensi_error($header,$message){
        echo '<style type="text/css">
                            body {
                            background-color:	#fff;
                            margin:				40px;
                            font-family:		Lucida Grande, Verdana, Sans-serif;
                            font-size:			12px;
                            color:				#000;
                            }
                            #content  {
                                border:				#999 1px solid;
                                background-color:	#fff;
                                padding:20px;
                                width: 400px;
                                border: 1px solid #b3b3b3;
                      
                                margin: 150px auto auto auto;
                                 box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff; 
                                 background: #fcfcfc;
                            }
                            .xp_hcmp{
                                border-top: 1px solid #b3b3b3;
                                padding :10px 0;
                                margin: 10px 0 0 0;
                            }
                            h1 {
                                font-weight:		normal;
                                font-size:			16px;
                                color:				#990000;
                                margin:				0 0 4px 0;
                                font-weight:bold;
                            }
                        </style><div id="content">
                      		<h1>'.$header.'</h1>
                      		<div class="xp_hcmp">'.$message.'</div>'.
                            'Page randerer on '.script_time().' seconds
                        	</div>';
    }
}

?>