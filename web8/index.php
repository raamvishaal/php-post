<?php
require('config/config.php');
require('config/db.php');
// create query
$q='SELECT * FROM post ORDER BY created_at DESC';
//get result
$r=mysqli_query($c,$q);

//fetch data
$p=mysqli_fetch_all($r,MYSQLI_ASSOC);
//var_dump($p);
//free result
mysqli_free_result($r);

mysqli_close($c);
?>
<?php include('ink/header.php');?>
<div class="container">
<h1>Posts</h1>
<?php
foreach($p as $po):?>
	<div class="well">
<h3><?php echo $po['title']; ?></h3>
<small>Created on <?php echo $po['created_at'];?> by
	<?php echo $po['author'];?></small>
	<p><?php echo $po['body'];?></p>
	<a class="btn btn-default" href="<?php echo R;?>post.php?id=<?php echo $po['id'];?>">Read More</a>
	<br><br>

</div>
<?php endforeach;?>
<a href="navbar.php">Add Post</a>
</div>
<?php include('ink/footer.php');?>
