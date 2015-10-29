<?php 
	include('header.php'); 
	include('model.php');
	
	$selectNews = new Model;
	$selectNews->selectAllNews();
	$rowsNum = $selectNews->getRowsNum();
	$rows = $selectNews->getRows();
	$query = $selectNews->getQuery();
?>
<div align="center">
	<h1>All news</h1>
	
	<table border=1>
		<tr>
			<th>News ID</th>
			<th>Title</th>
			<th>Date of publishing</th>
			<th>Operations</th>
		</tr>
		<?php 
			for($i=0; $i<$rowsNum; $i++){
			$rows = mysqli_fetch_array($query);
		?>
		<tr>
			<td>
				<p><?php echo $rows['id'];?></p>
			</td>
			<td width="400px">
				<a href="updateNews.php?id=<?php echo $rows['id']; ?>">
					<h4><?php echo $rows['title']; ?> </h4>
				</a>
			</td>
			<td>
				<span><?php echo $rows['date']; ?></span>
			</td>
			<td>
				<a href="updateNews.php?id=<?php echo $rows['id']; ?>"><input type="button" value="UPDATE"/></a>
				<a href="deleteNews.php?id=<?php echo $rows['id']; ?>"><input type="button" value="DELETE"/></a>
			</td>
		</tr>
		<?php
			}
		?>			
	</table>
	<br/>
	<br/>
	<a href="addNews.php">ADD NEWS</a>
</div>
<?php include('footer.php'); ?>

