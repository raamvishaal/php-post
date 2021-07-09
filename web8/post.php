<?php
require('config/config.php');
require('config/db.php');
if(isset($_POST['delete'])){
	//echo 'gr';
	$d=mysqli_real_escape_string($c,$_POST['delete_id']);

	$q="DELETE FROM post WHERE id={$d}";
	if(mysqli_query($c,$q)){
		header('Location: '.R.'');
	}else echo 'ERROR'.mysqli_error($c);

}
// create query
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
<body><div class="container">
	<a href="<?php echo R;?>" class="btn btn-default">Back</a>
<h1><?php echo $p['title']; ?></h1>
<small>Created on <?php echo $p['created_at'];?> by
	<?php echo $p['author'];?></small>
	<p><?php echo $p['body'];?></p>
<hr>	
<form style="float:right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<input type="hidden" name="delete_id" value="<?echo $p['id'];?>">
	<input type="submit" name="delete" value="Delete"class="btn btn-danger">
</form>
<a href="<?php echo R;?>editpost.php?id=<?php echo $p['id'];?>"class="btn btn-default">Edit</a>

</div>
<?php include('ink/footer.php');?>