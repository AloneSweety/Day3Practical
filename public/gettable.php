
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
//get the db connection file

require_once 'dbconf.php';//(conf/dbconf.php) (folder/file)
require_once 'myfun.php';

PrintTable ("name",$connect);

//create a search form
//write a function to search the books
//echo $_SERVER['PHP_SELF']; //GET THE FILE NAME

?>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "GET">
	<table >
		<tr >
			<td align=right>Emp_Name: </td>
			<td><input type="text" name="empname"/></td>
		</tr>
		<tr>
			<td><input type="submit" value="Search"></td>
		</tr>

	</table>

</form>
<?php

if (isset($_GET['name']) && $_GET['name'] != '') {
	Searchemployee($_GET['name'],$connect);
}

//Searchemployee('Mark',$connect);
?>
</body>
</html>
