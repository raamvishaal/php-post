<?php
require('config/config.php');
require('config/db.php');
//check for submit
if(isset($_POST['submit'])){
	//echo 'gr';
$update_id=mysqli_real_escape_string($c,$_POST['update_id']);
$t=mysqli_real_escape_string($c,$_POST['title']);
$a=mysqli_real_escape_string($c,$_POST['author']);
$b=mysqli_real_escape_string($c,$_POST['body']);

	$q="UPDATE post SET
	title='$t',
	author='$a',
	body='$b'
	WHERE id={$update_id}";
	if(mysqli_query($c,$q)){
		header('Location: '.R.'');
	}else echo 'ERROR'.mysqli_error($c);

}
$id=mysqli_real_escape_string($c,$_GET['id']);
$q='SELECT * FROM post WHERE id='.$id;
//get result
$r=mysqli_query($c,$q);

//fetch data
$p=mysqli_fetch_assoc($r);
//var_dump($p);
//free result
mysqli_free_result($r);

mysqli_close($c);
?>
<?php include('ink/header.php');?>
<div class="container">
<h1>Add Posts</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control"value="<?php echo $p['title'];?>">
	</div>
	<div class="form-group">
		<label>Author</label>
		<input type="text" name="author" class="form-control"value="<?php echo $p['author'];?>">
	</div>
		<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"><?php echo $p['body']?></textarea>

	</div>
	<input type="hidden" name="update_id" value="<?php echo $p['id'];?>">
	<input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>

</div>
<?php include('ink/footer.php');?>
