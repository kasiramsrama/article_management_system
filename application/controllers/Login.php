<?

class login extends MY_controller
{
	
public function __construct(){

	parent::__construct();

	if($this->session->userdata('id'))
		return redirect('admin/welcome');
}


public function index(){
	$this->load->library('form_validation');

	$this->form_validation->set_rules('uname','User name','required|alpha');
	$this->form_validation->set_rules('pass','Password','required');
	$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	

	if($this->form_validation->run())
	{

		$uname=$this->input->post('uname');
		$pass=$this->input->post('pass');
		$this->load->model('logicmodel');

		$id=$this->logicmodel->isvalidate($uname,$pass);

		if($id)
		{
			$userName=$this->db->select('username')->from('users')->where('id',$id)->get()->row();
			$this->load->library('session');
			$this->session->set_userdata('id',$id);
			$this->session->set_userdata('username',$userName->username);
			return redirect('Admin/welcome');
			//$this->load->view('Admin/dashboard');
			//echo"details matched";
		}
		else{
			$this->session->set_flashdata('Login_failed','Invalid Username/Password');
			return redirect('login');
		}


		//

		//echo "Username is ".$uname. "</br>". "Password is " .$pass;
	}

	else{
		$this->load->view('Admin/login');
	}
}
public function register(){
	$this->load->view('Admin/register');

}














public function sendemail()
 {
  
  $this->form_validation->set_rules('username','User Name','required|alpha');
  $this->form_validation->set_rules('password','Password','required|max_length[12]');
  $this->form_validation->set_rules('firstname','First Name','required|alpha');
  $this->form_validation->set_rules('lastname','last Name','required|alpha');
  $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  if($this->form_validation->run())
  {


  	$post=$this->input->post();
		$this->load->model('logicmodel');
		if($this->logicmodel->add_user($post)){
			
				$this->session->set_flashdata('user','User added sucessfullly');
				$this->session->set_flashdata('user_class','alert-success');
				
				// $this-> echo anchor('login/index', 'Login?', 'class="link-class"');
			}

			else{
				$this->session->set_flashdata('user','User not added. Pleas try again');
				$this->session->set_flashdata('user_class','alert-danger');
			}
			return redirect("login/sendemail");



    /*$this->load->library('email');
  
    $this->email->from(set_value('email'),set_value('fname'));
    $this->email->to("ajay.kasiramsarma65@gmail.com.com");
    $this->email->subject("Registratiion Greeting..");

    $this->email->message("Thank  You for Registratiion");
    $this->email->set_newline("\r\n");
    $this->email->send();

     if (!$this->email->send()) {
    show_error($this->email->print_debugger()); }
  else {
    echo "Your e-mail has been sent!";
  }*/
  }
  else
  {
   $this->load->view('Admin/register');
  }
 }

 

}
?>