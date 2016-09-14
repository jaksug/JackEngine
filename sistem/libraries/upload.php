<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
 class XP_Upload {
    public $ekstensi_list = "*";
    public $file_temp     = "";
    public $file_name     = "";
    public $file_ekstensi = "";
    public $new_file_name = "";
    public $file_size     = 0;
    public $file_lokasi   = "";
    public $file_type     = "";
    public $pesan         = "";
    
    function upload($param = '', $path , $file_name = '')
    {
        if($param === ''){
            return false;
        }
        
        if(! isset($_FILES[$param])){
            return false;
        }
        
        if(! $this->path_valid($path)){
            return false;
        }
        
        $this->file_temp    = $_FILES[$param]['tmp_name'];
        $this->file_name    = $_FILES[$param]['name'];
        $this->file_type    = preg_replace("/^(.+?);.*$/", "\\1", $_FILES[$param]['type']);
		$this->file_type    = strtolower(trim(stripslashes($this->file_type), '"'));
        $this->file_ekstensi= $this->get_ekstensi($this->file_name);
        
        
         if(! $this->cek_perizinan()){
            return false;
        }
  
       if($file_name === ''){
            $file_name = $this->file_name;
        } else {
            $file_name = $file_name.$this->get_ekstensi($this->file_name);
        }
        
        $tujuan = $path.'/'.$this->filter_nama_file($file_name);
        
        if(move_uploaded_file($this->file_temp, $tujuan)){
            $this->file_lokasi = $tujuan;
            return true;
        }
        return false;
    }
    
    function upload_gambar($param = '', $path  ,$nude_cek = true,$file_name = '') 
    {
        $this->izinkan_jenis_file('gif|jpg|jpeg|png');
        $upload = $this->upload($param,$path);
        $xp     = getInstance();
        $gambar = $xp->image;
        if($upload) {
            if($this->is_image()) {
                if($gambar->cek($this->file_lokasi)) {
                    if($nude_cek) {
                        if($gambar->nudity_cek($this->file_lokasi)) {
                            $this->pesan = 'gambar terdeteksi memiliki konten porno';
                             unlink($this->file_lokasi);                            
                            return true;
                        }
                        $this->pesan = 'sukses mengupload gambar';
                        return true;
                    }
                    else{
                        $this->pesan = 'sukses mengupload gambar';
                        return true;
                    }
                }
                $this->pesan = 'konten gambar error';
                unlink($this->file_lokasi);
                return false;
            }
             $this->pesan = 'bukan file gambar';
             unlink($this->file_lokasi);
            return false;  
        }
        $this->pesan = 'gagal mengupload gambar';
        return false;
    }
    
    function cek_perizinan()
    {
        if($this->ekstensi_list == "*") {
            return true;
        }

        if(count($this->ekstensi_list) == 0 || ! is_array($this->ekstensi_list)) {
            return false;
        }
        
        $ext = strtolower(ltrim($this->file_ekstensi, '.'));
        
        if(in_array($ext, $this->ekstensi_list)){
            return true;
        }
        return false;
    }
    
    function set_ekstensi($eks) {
        $this->ekstensi_list = $eks;
    }
    
    public function izinkan_jenis_file($types)
	{
		if ( ! is_array($types) && $types == '*')
		{
			$this->ekstensi_list = '*';
			return;
		}
		$this->ekstensi_list = explode('|', $types);
	}
    
    function path_valid($path)
    {
        if(!is_dir($path)){
            return false;
        }
        return true;
    }
    
    function get_ekstensi($filename)
	{
		$x = explode('.', $filename);
		return '.'.end($x);
	}
    
    public function anti_xss($flag = FALSE)
	{
        $xp =getInstance();
        
        $xps = $xp->load->library('keamanan');
		$xps->xss_clean = ($flag == TRUE) ? TRUE : FALSE;
	}
    
    function filter_nama_file($filename)
	{
		$bad = array(
						"<!--",
						"-->",
						"'",
						"<",
						">",
						'"',
						'&',
						'$',
						'=',
						';',
						'?',
						'/',
						"%20",
						"%22",
						"%3c",		// <
						"%253c",	// <
						"%3e",		// >
						"%0e",		// >
						"%28",		// (
						"%29",		// )
						"%2528",	// (
						"%26",		// &
						"%24",		// $
						"%3f",		// ?
						"%3b",		// ;
						"%3d"		// =
					);

		$filename = str_replace($bad, '', $filename);

		return stripslashes($filename);
	}
	public function is_image()
    {
		// IE will sometimes return odd mime-types during upload, so here we just standardize all
		// jpegs or pngs to the same file type.

		$png_mimes  = array('image/x-png');
		$jpeg_mimes = array('image/jpg', 'image/jpe', 'image/jpeg', 'image/pjpeg');

		if (in_array($this->file_type, $png_mimes)) {
			$this->file_type = 'image/png';
		}

		if (in_array($this->file_type, $jpeg_mimes)) {
			$this->file_type = 'image/jpeg';
		}

		$img_mimes = array(
							'image/gif',
							'image/jpeg',
							'image/png',
						);

		return (in_array($this->file_type, $img_mimes, TRUE)) ? TRUE : FALSE;
	}
 }