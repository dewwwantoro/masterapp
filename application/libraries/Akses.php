<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
  
class Akses {

	private $pengguna;
	private $url;

	public function __construct()
    {
      $this->ci =& get_instance();
    }

	function cek($pengguna,$url){
		$res=$this->ci->db->query("SELECT COUNT(a.id_inc) res
								FROM ms_privilege a
								JOIN ms_menu b ON a.ms_menu_id=b.id_inc
								JOIN ms_pengguna c ON c.ms_role_id=a.ms_role_id
								WHERE c.id_inc=1 AND REPLACE(link_menu,'/','.')='$url' AND STATUS='1'")->row();
		// return $this->ci->db->last_query();

		if($res->res >0){
			return 'true';
		}else{
			echo $this->ci->load->view('errors/403','',true);
			die();
			// die('asfd');
		}


		// return $pengguna;
		/*$rk=$this->ci->db->query("SELECT  COUNT(*) IS_READ
								FROM  USER_ROLE_PERMISSION A
								JOIN USER_PERMISSION B ON A.PERMISSION_ID=B.ID_INC
								JOIN VPENGGUNA C ON C.USER_ROLE_ID=A.ROLE_ID
								WHERE NIP='$pengguna' AND UPPER(B.NAMA)=UPPER('$url')")->row();
		if($rk->IS_READ>0){
			// yes
			$rn=$this->ci->db->query("SELECT PERMISSION_ID,CASE WHEN SUM( IS_CREATE) >0 THEN 1 ELSE 0 END  IS_CREATE ,CASE WHEN  SUM( IS_UPDATE) >0 THEN 1 ELSE 0 END IS_UPDATE,CASE WHEN SUM(IS_DELETE) >0 THEN 1 ELSE 0 END IS_DELETE,CASE WHEN SUM(IS_DETAIL) >0 THEN 1 ELSE 0 END IS_DETAIL 
									FROM  USER_ROLE_PERMISSION A
									JOIN USER_PERMISSION B ON A.PERMISSION_ID=B.ID_INC
									JOIN VPENGGUNA C ON C.USER_ROLE_ID=A.ROLE_ID
									WHERE NIP='$pengguna' AND UPPER(B.NAMA)=UPPER('$url')
									GROUP BY PERMISSION_ID")->row();

			$dd=array(
				'is_read'   =>'1',
				'is_update' =>$rn->IS_UPDATE,
				'is_create' =>$rn->IS_CREATE,
				'is_delete' =>$rn->IS_DELETE,
				'is_detail' =>$rn->IS_DETAIL
				);
			return $dd;
			
		}else{
			show_403();
		}*/
	}


	function cekCreate($pengguna,$url){
		$rn=$this->ci->db->query("SELECT PERMISSION_ID,CASE WHEN SUM( IS_CREATE) >0 THEN 1 ELSE 0 END  IS_CREATE ,CASE WHEN  SUM( IS_UPDATE) >0 THEN 1 ELSE 0 END IS_UPDATE,CASE WHEN SUM(IS_DELETE) >0 THEN 1 ELSE 0 END IS_DELETE,CASE WHEN SUM(IS_DETAIL) >0 THEN 1 ELSE 0 END IS_DETAIL 
									FROM  USER_ROLE_PERMISSION A
									JOIN USER_PERMISSION B ON A.PERMISSION_ID=B.ID_INC
									JOIN VPENGGUNA C ON C.USER_ROLE_ID=A.ROLE_ID
									WHERE NIP='$pengguna' AND UPPER(B.NAMA)=UPPER('$url')
									GROUP BY PERMISSION_ID")->row();
		if($rn->IS_CREATE>0){
			return array('is_create'=>$rn->IS_CREATE);
		}else{
			show_403();
			
		}
	}

	function cekUpdate($pengguna,$url){
		$rn=$this->ci->db->query("SELECT PERMISSION_ID,CASE WHEN SUM( IS_CREATE) >0 THEN 1 ELSE 0 END  IS_CREATE ,CASE WHEN  SUM( IS_UPDATE) >0 THEN 1 ELSE 0 END IS_UPDATE,CASE WHEN SUM(IS_DELETE) >0 THEN 1 ELSE 0 END IS_DELETE,CASE WHEN SUM(IS_DETAIL) >0 THEN 1 ELSE 0 END IS_DETAIL 
									FROM  USER_ROLE_PERMISSION A
									JOIN USER_PERMISSION B ON A.PERMISSION_ID=B.ID_INC
									JOIN VPENGGUNA C ON C.USER_ROLE_ID=A.ROLE_ID
									WHERE NIP='$pengguna' AND UPPER(B.NAMA)=UPPER('$url')
									GROUP BY PERMISSION_ID")->row();
		if($rn->IS_UPDATE>0){
			return array('is_update'=>$rn->IS_UPDATE);
		}else{
			show_403();			
		}
	}

	function cekDelete($pengguna,$url){
		$rn=$this->ci->db->query("SELECT PERMISSION_ID,CASE WHEN SUM( IS_CREATE) >0 THEN 1 ELSE 0 END  IS_CREATE ,CASE WHEN  SUM( IS_UPDATE) >0 THEN 1 ELSE 0 END IS_UPDATE,CASE WHEN SUM(IS_DELETE) >0 THEN 1 ELSE 0 END IS_DELETE,CASE WHEN SUM(IS_DETAIL) >0 THEN 1 ELSE 0 END IS_DETAIL 
									FROM  USER_ROLE_PERMISSION A
									JOIN USER_PERMISSION B ON A.PERMISSION_ID=B.ID_INC
									JOIN VPENGGUNA C ON C.USER_ROLE_ID=A.ROLE_ID
									WHERE NIP='$pengguna' AND UPPER(B.NAMA)=UPPER('$url')
									GROUP BY PERMISSION_ID")->row();
		if($rn->IS_DELETE>0){
			return array('is_delete'=>$rn->IS_DELETE);
		}else{
			show_403();			
		}
	}


	function cekDetail($pengguna,$url){
		$rn=$this->ci->db->query("SELECT PERMISSION_ID,CASE WHEN SUM( IS_CREATE) >0 THEN 1 ELSE 0 END  IS_CREATE ,CASE WHEN  SUM( IS_UPDATE) >0 THEN 1 ELSE 0 END IS_UPDATE,CASE WHEN SUM(IS_DELETE) >0 THEN 1 ELSE 0 END IS_DELETE,CASE WHEN SUM(IS_DETAIL) >0 THEN 1 ELSE 0 END IS_DETAIL 
									FROM  USER_ROLE_PERMISSION A
									JOIN USER_PERMISSION B ON A.PERMISSION_ID=B.ID_INC
									JOIN VPENGGUNA C ON C.USER_ROLE_ID=A.ROLE_ID
									WHERE NIP='$pengguna' AND UPPER(B.NAMA)=UPPER('$url')
									GROUP BY PERMISSION_ID")->row();
		if($rn->IS_DETAIL>0){
			return array('is_detail'=>$rn->IS_DETAIL);
		}else{
			show_403();			
		}
	}



	 function curPageURL() { 
		$url = 'http';
		// kalau HTTPS terdeteksi, maka $url + "s" :
		if(isset($_SERVER["HTTPS"])){
			if ($_SERVER["HTTPS"] == "on") {
			$url .= "s";
			// nilai $url disini = "https"
			}
		}
		// setelah itu $url + '://' :
		$url .= "://";
		// nilai $url disini = "http://" atau "https://"
		// kalau server port custom (bukan port 80 atau 443) :
		if ($_SERVER["SERVER_PORT"] != "80") {
			// maka $url = http(s)://servername + ":" + "custom port" + "request_uri" :
			$url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			// nilai $url disini = 'http(s)://servername:port/req_uri'
		} else {
			// klo port-nya default 80 :
			$url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
			// nilai $url disini 'http(s)://servername/req_uri'
		}
		$es=str_replace(base_url(),'',$url);
		$we=str_replace('.html', '',$es);
		$er=str_replace('/','.',$we);
		return $er;
	} 
        

 
	
}