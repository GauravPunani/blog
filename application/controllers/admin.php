<?php 
	
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('user_id')){ return redirect('login');}
		$this->load->model('articlelist', 'article');
	}
	public function dashboard()
				{		
					$this->load->library('pagination');
					$config=[
						'base_url'		=>		base_url('admin/dashboard'),
						'per_page'		=>		5,
						'total_rows'	=>		$this->article->num_rows(),
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
					$articles=$this->article->articles($config['per_page'],$this->uri->segment(3));

					$this->load->view('admin/dashboard',['articles'=>$articles]);
				}	
	public function add_article()
			{
				$this->load->helper('form');
				$this->load->view('admin/add_article');
			}		
	public function store_article()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
		if($this->form_validation->run('articles_validation')==false)
		{
			$this->load->view('admin/add_article');
		}
		else
		{
			$data=$this->input->post();
			//new code of line added on 22/02/18
			unset($data['submit']);
				return $this->setflashAndReturn(
						$this->article->insert_articles($data),
						'Article Inserted Successfully',
						'Error in Inserting Article'	
			);
		}
	}
	public function edit_articles($article_id)
	{
		$data=$this->article->find_articles($article_id);
		$this->load->helper('form');
		$this->load->view('admin/edit_articles',['article'=>$data]);
	}
	public function delete_article($article_id)
	{
		$data=$this->article->delete_article($article_id);
		$this->session->set_flashdata('successdel','Record Deleted');
		redirect('admin/dashboard');
	}
	public function update_article($article_id)
	{
			$this->load->library('form_validation');
		if($this->form_validation->run('articles_validation')==false)
		{
			  
                $article = $this->article->find_articles($article_id);
              $this->load->helper('form');
			$this->load->view('admin/edit_articles',['article'=>$article]);
		}
		else
		{
			$data=$this->input->post();
			unset($data['submit']);
			return $this->setflashAndReturn(
				$this->article->update_article($article_id,$data),
					"Article Updated Successfully",
					"Error in Updating Article"
			);
			
		}	
	}
	private function setflashAndReturn($true_false,$success_msg,$failure_msg)
	{
		if($true_false)
		{
			$this->session->set_flashdata('feedback',$success_msg);
			$this->session->set_flashdata('feedback_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('feedback',$failure_msg);
			$this->session->set_flashdata('feedback_class','alert-danger');
		}
		return redirect('admin/dashboard');
	}
}
 ?>