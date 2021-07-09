<?php
require('config/config.php');
require('config/db.php');
//check for submit
if(isset($_POST['submit'])){
	//echo 'gr';
$t=mysqli_real_escape_string($c,$_POST['title']);
$a=mysqli_real_escape_string($c,$_POST['author']);
$b=mysqli_real_escape_string($c,$_POST['body']);

	$q="INSERT INTO post(title,author,body) VALUES('$t','$a','$b')";
	if(mysqli_query($c,$q)){
		header('Location: '.R.'');
	}else echo 'ERROR'.mysqli_error($c);

}
?>
<?php include('ink/header.php');?>
<div class="container">
<h1>Add Posts</h1>
<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
	<div class="form-group">
		<label>Title</label>
		<input type="text" name="title" class="form-control">
	</div>
	<div class="form-group">
		<label>Author</label>
		<input type="text" name="author" class="form-control">
	</div>
		<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>

	</div>
	<input type="submit" name="submit" value="Submit" class="btn btn-primary">
</form>

</div>
<?php include('ink/footer.php');?>
