<!DOCTYPE html>
<html>
<head>
	<title>Article List</title>

	<?= link_tag("Assets/Css/bootstrap.css")?>
	
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a> 

        <?php
   if($this->session->userdata('id'))
  
          {    
            
?>
   <a class="navbar-brand" href="#">Welcome <?echo $this->session->userdata('username') ?></a> 
          
            
    </div>
<a href="<?=  base_url('Admin/logout'); ?>" class="btn btn-danger" style="">Logout</a>

<?

}
  ?>





   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
     
    

  </div>
</nav>
