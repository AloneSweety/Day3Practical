
<?php 
function PrintTable($student,$connect)
{
	try {
		$sql = "SELECT * FROM $student";
		$result = mysqli_query($connect,$sql);
	
		if (mysqli_num_rows($result)>0) {
		
			echo "<table border='1'>";
			$col = mysqli_fetch_fields($result);
		
			echo "<tr>";
			foreach ($col as $value) {
			
				echo "<td>$value->name</td>";
			}
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}
function PrintTableCols($student,$connect,$name)
{
	try {

		$sql = "SELECT ";
		for ($i=0; $i < sizeof($name)-1; $i++) { 
			$sql .=$name[$i].",";
			//echo $sql;
		}
		$sql .=$name[sizeof($name)-1]." from $student";

		$result = mysqli_query($connect,$sql);
		if (mysqli_num_rows($result)>0) {
			echo "<table border='1'>";
			$col = mysqli_fetch_fields($result);
			echo "<tr>";
			foreach ($col as $value) {
				echo "<td>$value->name</td>";
			}
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}

function Searchname($Alice,$connect)
{
	try {

		$sql = "SELECT * FROM student where gender like '%$Alice%' ";
		$result = mysqli_query($connect,$sql);
		if (mysqli_num_rows($result)>0) {
			echo "<table border='1'>";
			$col = mysqli_fetch_fields($result);
			echo "<tr>";
			foreach ($col as $value) {
				echo "<td>$value->name</td>";
			}
			echo "</tr>";
			
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				foreach ($row as $key => $value) {
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "No results";
		}
		
	} catch (Exception $e) {
		die($e->getMessage());
	}
}

?>
