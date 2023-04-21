<?php
include "dbconnect.php";
$output = '';
$query ='';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connection, $_POST["query"]);
	$query = "
	SELECT * FROM product 
	WHERE name LIKE '%".$search."%' AND NOT name=' '";
}

if($query !== '') {
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows($result) > 0)
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th> Product Name </th>
								<th> Price </th>
								<th> Count </th>
								<th> Desc </th>
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
				<tr>
					<td><a href="productPage.php?product_id='.$row['id'].'" style="text-decoration:underline;">'.$row["name"].'</a></td>
					<td>'.$row["price"].'</td>
					<td>'.$row["count"].'</td>
					<td>'.$row["desc"].'</td>
				</tr>
	
			';
		}
		echo $output;
	}
	else
	{
		echo 'Data Not Found';
	}
}
?>