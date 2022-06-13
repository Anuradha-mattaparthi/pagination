<?php
$conn=new mysqli('localhost','Anu','a1n2u3$$','getintouch');

$num_per_page=05;
if(isset($_GET['page']))
{
	$page=$_GET['page'];
}
else {
	$page=1;
}
$start_from=($page-1)*05;

$users="SELECT * FROM  `pagenation` LIMIT $start_from,$num_per_page";
$results=mysqli_query($conn,$users);


?>




<!DOCTYPE html>
<html>
<head>
	<title>pagenation</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
table.center{
margin-left: auto;
margin-right: auto;
font-size: 30px;
width:600px;
margin-top: 50px;
}
.pagination a:hover
{
	background-color: #0091ae;
}
</style>
</head>
<body>
<table class="table table-striped center" width="500px">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Email</th>
	</tr>
	
	<?php
while($re=mysqli_fetch_assoc($results))
{ ?>
<tr>
    <td><?=$re['id'] ?></td>
    <td><?=$re['name'] ?></td>
    <td><?=$re['email'] ?></td>
</tr>
<?php } ?>

</table>
<nav aria-label="Page navigation example">
<?php 
$sql="SELECT * FROM  `pagenation`";
$rs=mysqli_query($conn,$sql);
$total_records=mysqli_num_rows($rs);
//echo $total_records;
 $total_pages=ceil($total_records/$num_per_page);
 //echo $total_pages;
 echo '<ul class="pagination">';
 for($i=1;$i<=$total_pages;$i++)
 {
 	echo "<li class='page-item'><a class='page-link' href='index.php?page=".$i."'>$i</a></li>";
 }
echo '</ul>';
?>
</nav>
</body>
</html>