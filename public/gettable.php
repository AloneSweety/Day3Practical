
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

PrintTable ("student",$connect);

//create a search form
//write a function to search the books
//echo $_SERVER['PHP_SELF']; //GET THE FILE NAME

?>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "GET">
	<table >
		<tr >
			<td align=right>Student Name: </td>
			<td><input type="text" name="name"/></td>
		</tr>
		<tr>
			<td><input type="submit" value="Search"></td>
		</tr>

	</table>

</form>
<?php

if (isset($_GET['name']) && $_GET['name'] != '') {
	SearchData($_GET['name'],$connect);
}

//SearchData('Bob Smith ',$connect);
?>
</body>
</html>
<?php
//get the database connection file
require_once 'dbconf.php';
function PrintTable($tableName,$connect){
try{
	//Query
	$sql = "SELECT * FROM $tableName";

	//execute the query (call variable,query)
	$result = mysqli_query($connect,$sql);

	if (mysqli_num_rows($result)>0) {
		//fetch the data from rows

		echo "<table border=1> ";

	$col = mysqli_fetch_fields($result);
	//print the column
	echo "<tr>";
	foreach ($col as $value) {
		//return an object
		//print_r($value)
			echo "<td>".$value->name."</td>";
		}
		echo "</tr>";
		while($row = mysqli_fetch_assoc($result)){
			//print the data in table format

		echo "<tr>";
		foreach ($row as $key => $value) {
			echo "<td>$value</td>";
		}
		echo "</tr>";
		}
		echo "</table>";
	} 
	else{
		echo "No results"; //table is empty
	}

	}


catch(Exception $e){
	die($e->getMessage());
}
}
 //GET DATA FROM DB
 function SearchData($name,$connect){
            try{
            
                $sql = "SELECT * FROM  student where name like '%$name%' ";
            
            
                $result = mysqli_query($connect,$sql);
            
                if (mysqli_num_rows($result)>0) {
                
            
                    echo "<table border=1> ";
            
                $col = mysqli_fetch_fields($result);
            
                echo "<tr>";
                foreach ($col as $value) {
                    
                        echo "<td>".$value->name."</td>";
                    }
                    echo "</tr>";
                    while($row = mysqli_fetch_assoc($result)){
                        
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                    }
                    echo "</table>";
                } 
                else{
                    echo "No results"; 
                }
            
                }
            
            
            catch(Exception $e){
                die($e->getMessage());
            }
        }

?>