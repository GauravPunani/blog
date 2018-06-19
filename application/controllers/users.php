<?php 

/**
* 
*/
class Users extends MY_Controller
{
	
	public function index()
	{
		//$this->load->helper('url');
		//$this->load->helper('html');
		$this->load->helper('form');
		$this->load->model('articlelist','article');
		//start
		$this->load->library('pagination');
					$config=[
						'base_url'		=>		base_url('users/index'),
						'per_page'		=>		5,
						'total_rows'	=>		$this->article->all_num_rows(),
						'full_tag_open'	=>		"<ul class='pagination'>",
						'full_tag_close'=>		'</ul>',
						'next_tag_open'	=>		"<li class='page-item'>",
						'next_tag_close'=>		'</li>',
						'prev_tag_open' =>		"<li class='page-item'>",
						'prev_tag_close'=>		"</li>",
						'num_tag_open' =>		"<li class='page-item'>",
						'num_tag_close'=>		"</li>",
						'cur_tag_open'	=>		"<li class='page-item active'><a class='page-link'>",
						'cur_tag_close'	=>		"</a></li>",

								
					];
					$config['attributes']=array('class'=>'page-link');
					$this->pagination->initialize($config);
					$articles=$this->article->get_all_articles($config['per_page'],$this->uri->segment(3));

					$this->load->view('public/articles_list',compact('articles'));
		//end
		
	}
	public function search()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search','SEARCH','required');
		if(! $this->form_validation->run())
		{
			return $this->index();	
		}
		$query=$this->input->post('search');
		return redirect("users/search_result/$query");
		// $this->load->model('articlelist','article');
		// $articles=$this->article->search($query);
		// $this->load->view('public/search_list',compact('articles'));
	}
	public function search_result($query)
	{
		$this->load->helper('form');
		$this->load->model('articlelist','article');
		//start
		$this->load->library('pagination');
					$config=[
						'base_url'		=>		base_url("users/search_result/$query"),
						'per_page'		=>		5,
						'total_rows'	=>		$this->article->searched_num_rows($query),
						'uri_segment'	=>		4,
						'full_tag_open'	=>		"<ul class='pagination'>",
						'full_tag_close'=>		'</ul>',
						'next_tag_open'	=>		"<li class='page-item'>",
						'next_tag_close'=>		'</li>',
						'prev_tag_open' =>		"<li class='page-item'>",
						'prev_tag_close'=>		"</li>",
						'num_tag_open' =>		"<li class='page-item'>",
						'num_tag_close'=>		"</li>",
						'cur_tag_open'	=>		"<li class='page-item active'><a class='page-link'>",
						'cur_tag_close'	=>		"</a></li>",

								
					];
					$config['attributes']=array('class'=>'page-link');
					$this->pagination->initialize($config);
					$articles=$this->article->search($query,$config['per_page'],$this->uri->segment(4));
					$this->load->view('public/search_list',compact('articles'));

	}
	public function article($id)
	{
		$this->load->helper('form');
		$this->load->model('articlelist','articles');
		if($articles=$this->articles->get_article($id))
		{
			$this->load->view('public/article',compact('articles'));
		}
		else
		{
			echo "not working";
		}

	}
}
 ?>