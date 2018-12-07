<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Photo_activity_album_m extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$this->db->select('photo_activity_album.*, photo_activity_category.title as category');
		$this->db->join('photo_activity_category', 'photo_activity_album.category_id=photo_activity_category.id', 'left');
		$this->db->order_by('photo_activity_album.created_on', 'desc');
		return $this->db->get('photo_activity_album')->result();
	}

	public function get_detail($id)
	{
		$this->db->select('photo_activity.*, photo_activity_category.title as category');
		$this->db->join('photo_activity_category', 'photo_activity.category_id=photo_activity_category.id', 'left');
		$this->db->where('album_id', $id);
		$this->db->order_by('photo_activity.created_on', 'desc');
		return $this->db->get('photo_activity');
	}
}