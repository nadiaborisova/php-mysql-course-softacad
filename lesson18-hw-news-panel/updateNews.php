<?php 
	include('header.php'); 
	include('model.php');
	
	$updateNews = new Model;
	$id=$_GET['id'];
	$updateNews -> selectOneNews ($id);
	$updateNews->rows = mysqli_fetch_array($updateNews->query);
?>

<form action="update.php" method="post">
		<table>
			<tr>
				<th><span>ID:</span></th>
				<td><input type="text" name="id" value="<?php echo $updateNews->rows['id']; ?>"/></td>
			</tr>	
			<tr>
				<th><span>Title:</span></th>
				<td><input type="text" name="title" value="<?php echo $updateNews->rows['title']; ?>"/></td>
			</tr>			
			<tr>
				<th><span>Description:</span></th>
				<td><textarea name="description" cols="30" rows="10"><?php echo $updateNews->rows['description']; ?></textarea></td>
			</tr>			
			<tr>
				<th><span>Autor:</span></th>
				<td><input type="text" name="autor" value="<?php echo $updateNews->rows['autor']; ?>"/></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="UPDATE"/></td>
				<td><input type="reset" name="reset" value="RESET"/></td>
			</tr>
		</table>
	</form>
<?php include('footer.php'); ?>