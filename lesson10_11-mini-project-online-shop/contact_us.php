<?php 
	include('header.php'); 
	include('menu.php'); 
?>
<div id="content">
	<h2>Contact form</h2>
	<form action="post_process.php" method="post">
		<table>		
			<tr>
				<td>Subject:</td>
				<td><input type="text" name="subject"/></td>
			</tr>				
			<tr>
				<td>Name:</td>
				<td><input type="text" name="username"/></td>
			</tr>	
			<tr>
				<td>E-mail:</td>
				<td><input type="email" name="email"/></td>				
			</tr>
			<tr>
				<td>Message:</td>
				<td><textarea cols="30" rows="5"name="message"></textarea></td>				
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SEND"/>
					<input type="reset" value="RESET"/></td>				
			</tr>
		</table>
	</form>

</div>
<?php include('footer.php'); ?>