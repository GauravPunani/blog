<?php 
/**
* 
*/
class Articlelist extends CI_Model
{
	
	public function articles($limit,$offset)
	{
		$id=$this->session->userdata('user_id');
		$query=$this->db->
					select('title')
					->select('id')
					->from('post')
					->order_by('created_at','DESC')
					->where('user_id',$id)
					->limit($limit,$offset)
					->get();
		return $query->result();
	}
	public function get_all_articles($limit,$offset)
	{
		$query=$this->db->
					select(['id','title','created_at'])
					->order_by('created_at','DESC')
					->from('post')
					->limit($limit,$offset)
					->get();
		return $query->result();
	}
	public function all_num_rows()
	{
		$query=$this->db->
					select('title')
					->select('id')
					->from('post')
					->get();
		return $query->num_rows();
	}
	public function num_rows()
	{
		$id=$this->session->userdata('user_id');
		$query=$this->db->
					select('title')
					->select('id')
					->from('post')
					->where('user_id',$id)
					->get();
		return $query->num_rows();
	}
	public function insert_articles($array)
	{
		$affected_rows=	$this->db->insert('post',$array);
		return $affected_rows;
	}
	public function find_articles($article_id)
	{
		$d=$this->db
				->where('id',$article_id)
				->select(['id','title','body'])
				->get('post');
		return $d->row();
	}
	public function delete_article($article_id)
	{
		$d=$this->db
				->where('id',$article_id)
				->delete('post');
			return $d;
	}
	public function update_article($article_id,$fields)
	{	
		return $this->db
					->where('id',$article_id)
					->update('post',$fields);
	}
	public function search($query,$limit,$offset)
	{
		$q=$this->db->from('post')
					->order_by('created_at','DESC')
					->like('title',$query)
					->limit($limit,$offset)
					->get();
		return $q->result();
	}
	public function searched_num_rows($query)
	{
		$q=$this->db->from('post')
					->like('title',$query)
					->get();
		return $q->num_rows();
	}
	public function get_article($id)
	{
		$q=$this->db->from('post')
					->where('id',$id)
					->select(['title','body','created_at'])
					->get();
		if($q->num_rows())
			return $q->row();
		else
			return false;
	}
}
 ?>