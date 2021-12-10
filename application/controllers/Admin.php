<?

class Admin extends MY_controller
{
	



public function __construct()
  {
    parent::__construct();
    if( ! $this->session->userdata('id') )
    return redirect('login');

}


public function displaydata(){
	$this->load->model('logicmodel');
	$result=$this->logicmodel->adname();
	//$this->load->view('Admin/header','displayr',$result);
	//return true;
	
}
public function welcome(){
	//if(!$this->session->userdata('id'))
		//return redirect('Admin/index');
	$this->load->library('pagination');

	$this->load->model('logicmodel','ar');
	$config=['base_url'=>base_url('admin/welcome'),
			 'per_page'=>2,
			  'total_rows'=>$this->ar->num_rows(),
			  'full_tag_open'=>"<ul class='pagination'>",
			  'full_tag_close'=>"</ul>",
			  'next_tag_open'=>"<li>",
			  'next_tag_close'=>"</li>",
			  'prev_tag_open'=>"<li>",
			  'prev_tag_close'=>"</li>",
			  'num_tag_open'=>"<li>",
			  'num_tag_close'=>"<li>",
			  'cur_tag_open'=>"<li class='active'><a>",
			  'cur_tag_close'=>"</a></li>"

			];

			$this->pagination->initialize($config);


	$articles=$this->ar->articlelist($config['per_page'],$this->uri->segment(3));
	//$adname=$this->ar->adname();
	$this->load->view('Admin/dashboard',['articles'=>$articles]);
	//print_r($adname);
	//$this->displaydata();
	//$this->load->view('Admin/header',['admi'=>$adname]);

}




public function adduser(){
	
	//$this->load->library('session');
	//$this->session->userdata('id');

	$this->load->view('Admin/add_article');

}
public function edit_article($id){
	//$id=$this->input->post('id');
	$this->load->model('logicmodel');
	$rt=$this->logicmodel->find_article($id);
	//$this->load->library('session');
	//$this->session->userdata('id');

	$this->load->view('Admin/edit_article',['article'=>$rt]);
	//echo $id;
	//echo "<pre>";
	//print_r($rt);

}

public function delarticle(){

		$id=$this->input->post('id');
		$this->load->model('logicmodel');
		if($this->logicmodel->del($id))

			{
				$this->session->set_flashdata('msg','Articles delete sucessfullly');
				$this->session->set_flashdata('msg_class','alert-success');
			}

			else{
				$this->session->set_flashdata('msg','Articles not delete. Pleas try again');
				$this->session->set_flashdata('msg_class','alert-danger');
			}
			return redirect('admin/welcome');
		}



public function userValidation(){


	if($this->form_validation->run('add_article_rules')){
		$post=$this->input->post();
		$this->load->model('logicmodel');
		if($this->logicmodel->add_articles($post))

			{
				$this->session->set_flashdata('msg','Articles added sucessfullly');
				$this->session->set_flashdata('msg_class','alert-success');
			}

			else{
				$this->session->set_flashdata('msg','Articles not added. Pleas try again');
				$this->session->set_flashdata('msg_class','alert-danger');
			}
			return redirect('admin/welcome');
		}

	else{
		
		$this->load->view('Admin/add_article');
	}
}

public function update_article($articlid){
	
	if($this->form_validation->run('add_article_rules')){
	
		$post=$this->input->post();
		$this->load->model('logicmodel');
		if($this->logicmodel->updat_article($articlid,$post))

			{
				$this->session->set_flashdata('msg','Articles updated sucessfullly');
				$this->session->set_flashdata('msg_class','alert-success');
			}

			else{
				$this->session->set_flashdata('msg','Articles not updated. Pleas try again');
				$this->session->set_flashdata('msg_class','alert-danger');
			}
			return redirect('admin/welcome');
		}

	else{
		
		$this->load->view('Admin/edit_article');
	}
}

public function logout(){
	$this->session->unset_userdata('id');
	 return redirect('Login/index');

}


 

}
?>