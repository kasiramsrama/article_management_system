<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php include('header.php');
//echo $adname;?>

<div class="container" style="margin-top:50px;">
<div class="row">
<?=   anchor('admin/adduser','Add Articles',['class'=>'btn btn-primary'])  ?>
</div>
<body>
	<style type="text/css">
		table{
			border: 1px;
		}

		table, thead, tr,th {
  padding: 10px;
}
		
	</style>


	<div class="container" style="margin-top: 50px;">
		<?
  if($msg=$this->session->flashdata('msg')):
  	$msg_class=$this->session->flashdata('msg_class')
?>
  	<div class="row">
  			<div class="col-lg-6">
  				<div class="alert <?echo $msg_class?>">
  					<?echo $msg;?>
  				</div>
  			</div>



  	</div>

<?endif;?>
<!-- <?php echo $this->db->last_query(); ?> -->
	<div class="table">
			<table>
				<thead>
					<tr>
						
						<th>Article Title</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($articles)):?>
						<?php foreach ($articles as $art) : ?>
							
						

					<tr>
						
						<td><?= $art->article_title; ?></td>
						<td><?= anchor("admin/edit_article/{$art->id}",'Edit',['class'=>'btn btn-primary']);?></td>


						




						<!-- <?=
								form_open('admin/deluser'),
								form_hidden('id',$art->id),
								form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-primary']),
								form_close();



						?> -->
						<!-- <td><a href="#" class="btn btn-primary">Edit</a></td> -->
						<td><?=
								form_open('admin/delarticle'),
								form_hidden('id',$art->id),
								form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
								form_close();



						?></td>
					</tr>
				<?php endforeach; ?>

				<?php else: ?>
					<tr>
						<td colspan="3">Not data available</td>
					</tr>
					
					<?php endif; ?>


				</tbody>
				
			</table>
			<?echo $this->pagination->create_links();?> 

		<!-- 	<ul class="pagination">
			<li><a href=""><</a></li>
			<li><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="" class="active">5</a></li>
			<li><a href="">6</a></li>
			<li><a href="">></a></li>


			</ul>
 -->

	</div>
</body>
<?php include('footer.php');?>
</html>