<?php include('header.php');?>






<div class="container" style="margin-top: 20px;">
  <h1>Admin Form</h1>

  <?
  if($error=$this->session->flashdata('Login_failed')):?>

  	<div class="row">
  			<div class="col-lg-6">
  				<div class="alert alert-danger">
  					<?echo $error;?>
  				</div>
  			</div>



  	</div>

<?endif;?>

<?php echo form_open('login/index');?>
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
  <label for="Username"> Username:</label>
 <? echo form_input(['class'=>'form-control','placeholder' =>'Enter Username',
 'name'=>'uname','value'=>set_value('uname')]);  ?>
</div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
  <? echo form_error('uname');?></div>
</div>
<div class="row">
  <div class="col-lg-6" >
<div class="form-group">
  <label for="pwd"> Password:</label>
 <? echo form_password(['class'=>'form-control','type'=>'password','placeholder' =>'Enter Password','name'=>'pass']);?>
</div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
  <? echo form_error('pass');?></div>
</div>
<?php echo form_submit(['type'=>'submit','class'=>'btn-primary','value'=>'Submit']);?>
<?php echo form_reset(['type'=>'reset','class'=>'btn-primary','value'=>'Reset']);?>
 <?php echo anchor('login/register', 'Sign up?', 'class="link-class"') ?>
</div>




<?include('footer.php');?>