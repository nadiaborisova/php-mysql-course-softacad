<?php 
	include('header.php'); 
?>

<div align="center">
	<h1>Add news</h1>
	<form action="add.php" method="post">
		<table>
			<tr>
				<th><span>Title:</span></th>
				<td><input type="text" name="title"/></td>
			</tr>			
			<tr>
				<th><span>Description:</span></th>
				<td><textarea name="description" cols="30" rows="10"></textarea></td>
			</tr>			
			<tr>
				<th><span>Autor:</span></th>
				<td><input type="text" name="autor"/></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="ADD NEWS"/></td>
				<td><input type="reset" name="reset" value="RESET"/></td>
			</tr>
		</table>
	</form>
	<br/>
	<span><a href="index.php">Back to All news</a><span>
</div>
<?php include('footer.php'); ?>