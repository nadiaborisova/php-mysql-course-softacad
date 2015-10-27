<?php 
	include('header.php'); 
	include('menu.php');
	include('connect.php');
	
if(isset($_SESSION['login_user'])) {	
?>
	<h1>STATISTIC</h1>
	<strong>Task 1: Колко посещения има сайтът?</strong><br/>
<?php
	$result = mysqli_query($link,"SELECT * FROM log");
	$rows = mysqli_num_rows($result);
	echo 'Page views: '.$rows;
?>
	<br/><br/>
	<strong>Task 2: Списък с последните 20 посещения - коя страница, кой IP адрес и дата + час</strong>
<?php
	$result2 = mysqli_query($link,"SELECT * FROM `log` ORDER BY id DESC LIMIT 20");
		if(mysqli_num_rows($result2) > 0){
?>
	<table border=1 align="center">
		<tr>
			<th>IP</th>
			<th>Date</th>
			<th>Page visited</th>
		</tr>
<?php
	while($rows2 = mysqli_fetch_array($result2)){
		echo "<tr>";
			echo "<td>" . $rows2['ip_address'] . "</td>";
			echo "<td>" . $rows2['date'] . "</td>";
			echo "<td>" . $rows2['page_visited'] . "</td>";
		echo "</tr>";
	}
	echo "</table><br/>";
	}
	echo '<strong>Task 3: Втори списък с посетителите, групирани по IP адрес, като за всеки IP адрес извеждаме общия брой посещения.</strong>';
	$result3 = mysqli_query($link,"SELECT log.ip_address as IPAddress, log.date as Date, log.page_visited as PageVisited, COUNT(log.ip_address) FROM log GROUP BY ip_address");
?>
	<table border=1 align="center">
		<tr>
			<th>IP</th>
			<th>Total views</th>
		</tr>
<?php
	while($rows3 = mysqli_fetch_array($result3)){
		echo "<tr>";
			echo "<td>" . $rows3['IPAddress'] . "</td>";
			echo "<td>" . $rows3['COUNT(log.ip_address)'] . "</td>";
		echo "</tr>";
	}
?>
	</table>
	<a href='logout.php'>Logout</a>
	<br/>
	<br/>
<?php
}
else {
?>
<h1>LOGIN</h1>
<form action="login.php" method="post">
	<table align="center">
		<tr>
			<td><strong>Username:</strong></td>
			<td><input type="text" name="username"/></td>
		</tr>				
		<tr>
			<td><strong>Password:</strong></td>
			<td><input type="password" name="password"/></td>
		</tr>	
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="LOGIN"/>
				<input type="reset" name="reset" value="RESET"/></td>				
		</tr>
	</table>
</form>
<br/>
<?php
}
	include('footer.php'); 
?>