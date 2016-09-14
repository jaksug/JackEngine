<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright Xpresikan 2012
 * @info Exspresions Builder
 * @package JackEngine 0.1
 * @subpackage JackEngine
 * --------------------------------------------------------------------------------------
 */
 
class XP_Cache{
	private $cachedir = 'cache/';
	private $expire = 60;
    public $cache_list = array();
	
	// constructor
	public function __construct($cachedir = ''){
		if ($cachedir !== ''){
			if (!is_dir($cachedir) or !is_writable($cachedir)){
				throw new Exception('Cache directory must be a valid writeable directory.');	
			}
			$this->cachedir = $cachedir;
		}
	}
	
	// write data to cache file given an ID
	public function set($id, $data){
	   $id = md5($id);
		$file = $this->cachedir . $id;
		if (file_exists($file)){
			unlink($file);
		}
		// write data to cache
		if (!file_put_contents($file, serialize($data))){
			throw new Exception('Error writing data to cache file.');
		}
        $this->cache_list[] = $id;
	}
	
	// read data from cache file given an ID
	public function get($id){
	   $id = md5($id);
		$file = glob($this->cachedir . $id);
        $file = array_shift($file);
		if (!$data = file_get_contents($file))
		{
			throw new Exception('Error reading data from cache file.');
		}
		return unserialize($data);
	}
	
	// check if the cache file is valid or not
	public function valid($id,$set=''){
	   $id =md5($id);
        if($set !== ''){
            return (bool)$set;
        }
	   $file = glob($this->cachedir . $id);
       
             $file = array_shift($file); if(file_exists($file)){
		return (bool)(time() - filemtime($file) <= $this->expire);
        }
        return false;
	}
    
    public function set_expire( $expire ) {
        $this->expire = $expire;
    }
    
    public function hapus($id){
        $id = md5($id);
        $data = $this->cachedir . $id;
        if( file_exists($data)){
            unlink( $data );
        }
        return;
    }
}// End Cache class