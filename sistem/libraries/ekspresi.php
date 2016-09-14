<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
class XP_Ekspresi{
    public $ekspresi_table  = 'ekspresi';
    public $kondisi_table   = 'kondisi';
    public $ekspresi_for_tb = 'ekspresi_for';
    private static $instance;
    
    function __construct(){
        self::$instance = $this;
    }
    
    public static function getInstance(){
        return self::$instance;
    }
    
    function load_comment($post_id) 
    {
        $db = getDB();
        $data = $db->rawSelect("select * from comment where eks_id='$post_id'");
        foreach($data as $x) {
            echo "<div class='comment_item' id='com_".$x['c_id']."'>".$x['comment']."<span class='icon icon-remove pull-right -com' id='-cb".$x['c_id']."'></span></div>";
        }
    }
    
    function set_kondisi($uid , $kondisi)
    {
        $db     = getDB();
        $jumlah = strlen($kondisi);
        if($jumlah>19){
            return false;
        }
        $db->Update($this->kondisi_table,'aktif','0',"aktif='1'");
        $db->Masukan($this->kondisi_table,array(array('id'=>'','xp_id'=>$uid,'kondisi'=>$kondisi,'aktif'=>'1'))); 
    }
    
    function my_kondisi($uid = '')
    {
        $user       = getUser();
        if($uid == '')
            $id = $user->id;
        else 
            $id = $uid;
        $db         = getDB();
        return $db->get_one($this->kondisi_table,"xp_id='$user->id' AND aktif='1'");
    }
    
    function get_kondisi($id, $limit = '', $order = '')
    {
        $db     = getDB();
        $batas  = ($limit === '')? '' : "LIMIT '$limit'";
        $urut   = ($order === '')? '' : "ORDER BY $order";
        $data   = $db->get_one($this->kondisi_table, "id='$id'", $batas);
        if($db->jumlah>0){
            return $data;
        }
        return false;
    }
    
    function set_ekspresi($id, $ekspresi)
    {
        $user       = getUser();
        $db         = getDB();
        $jumlah     = strlen($ekspresi);
        $ekspresi   = nl2br($ekspresi);
        if($jumlah>355){
            return false;
        }
        $uid = $user->id;
        if($db->Masukan($this->ekspresi_table,array(array('id'=>'','eks_id'=>$id,'xp_id'=>$uid,'ekspresi'=>$ekspresi)))){
            return true;
        }
        return false;
    }
    
    function get_ekspresi($uid)
    {
        $db     = getDB();
        $data   = $db->get_one($this->ekspresi_table,"xp_id='$id'");
        if($db->jumlah>0){
            return $data;
        }
        return false;
    }
    
    function ekspresi_form()
    {
        $form = '<form id="xp_eks_plus" action="?xp=plus" method="post">';
        $form.=     '<textarea id="eks-box" name="xp_ekspresi" placeholder="Ungkapkan sesuatu"></textarea>';
        $form.=     '<input type="submit" class="btn btn-danger" value="ekpresikan"/>';
        $form.= '</form>';
        return $form;
    }
    
    function my_lingkungan_list2()
    {
        $user   = getUser();
        $data   = $user->lingkungan_ku();
        $konten = '<select id="eks_for">';
        $konten.= '<option value="public">Public</option>';
        foreach($data as $xp) {
            $konten .= '<option value="'.$xp['l_id'].'">'.$xp['nama'].'</option>';
        }
        $konten .= '</ul>';
        return $konten;
    }
     function my_lingkungan_list()
    {
        $user   = getUser();
        $data   = $user->lingkungan_ku();
        $konten = '<div id="xp-add-for" class="dropdown xp-list-for"><a  href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Berbagi Dengan<b class="caret"></b></a>';
        $konten.= '<ul class="xp-to dropdown-menu" role="menu">';
        $konten.= '<li class="xppubl" tipe="u" name="public" value="1"><a tabindex="-1" href="#">Semua orang</a></li>';
        foreach($data as $xp) {
            $konten .= '<li tipe="l" name="'.$xp['nama'].'" value="'.$xp['l_id'].'" class="'.$xp['l_id'].$xp['l_id'].'"><a tabindex="-1" href="#">'.$xp['nama'].'</a></li>';
        }
        $konten .= '
                    <div class="divider"></div>
                       <div class="xp-orang-plus"><a tabindex="-1" href="#">Tambahkan seseorang</a><textarea placeholder="Seseorang..."></textarea></div>
                </ul>
        </div>';
        return $konten;
    }
    
    function update()
    {
        $update = '<script src="media/js/xp.js"></script><div id="xp_upt" class="span9">'
                    .'<div id="xp_upt_c">'
                        .'<form id="xp_eks_plus" action="?xp=plus" method="post">'
                            .'<div id="xp_ecbc">'
                                .'<textarea class="ekspresi" id="eks-box" name="xp_ekspresi" placeholder="Ungkapkan sesuatu..."></textarea>'
                            
                            .'</div>'
                            .'<div id="xp_eks_for">'.$this->my_lingkungan_list().'<div id="eks_for" name="xp_ekspresi_for"><ul></ul></div></div>'
                            
                            .'<div id="xp_apt_hc">'
                                .'<input type="submit" id="xpresi_bttn" class="bt x-green" value="ekpresikan"/>'
                                .'<div class="icon icon-remove" id="xp_cbtn_c"></div>'
                            .'</div>'
                        .'</form>'
                    .'</div>'
                .'</div>';
               
        return $update;
    }
    
    function ekspresi_for($eks_id = '',$lid = '',$eks_tipe)
    {
        $db = getDB();
        $data = array('eks_id'=>$eks_id,'l_id'=>$lid,'eks_tipe'=>$eks_tipe);
        if($db->Masukan($this->ekspresi_for_tb,array($data))){
            return true;
        }
        return false;        
    }
}