<?php 
 
class Data extends CI_Model{	
	function hapus($where,$table)
	{
		$this->db->where($where)->delete($table);
	}

	function edit($where,$data,$table){
		$this->db->where($where)->update($table,$data);
	}	
}

?>