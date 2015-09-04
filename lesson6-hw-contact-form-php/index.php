<html>
	<head>
		<title>Contact form</title>
		<meta charset="UTF=8"/>
	</head>
	<body>
	
<?php
$user = "";
if(isset($_POST['subject'])&&isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['text']) ) {
	$user = $_POST['username'];
	echo "Благодаря Ви, " . $user. "!"; 
		
}
else {
?>
	<h1>ФОРМА ЗА ОБРАТНА ВРЪЗКА</h1>
        <form action="" method="post">
			<table>
				<tr>
					<td>Тема:</td>
					<td><input type="text" name="subject"/></td>
				</tr>				
				<tr>
					<td>Имена:</td>
					<td><input type="text" name="username"/></td>
				</tr>	
				<tr>
					<td>E-mail:</td>
					<td><input type="email" name="email"/></td>				
				</tr>
				<tr>
					<td>Съобщение:</td>
					<td><textarea cols="30" rows="5"name="text"></textarea></td>				
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Изпрати"/>
						<input type="reset" value="Изтрий"/></td>				
				</tr>
			</table>
		</form>
		
<?php } ?>
		
 	</body>
</html>