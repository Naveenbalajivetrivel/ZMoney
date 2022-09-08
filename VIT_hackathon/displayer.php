<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">	
	<title>Display</title>
</head>
<style>
table {
  border: 100%;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin-top: 0px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
*{
  margin:0;
  padding:0;
  font-family:verdana;
}
#abc{
  width:100%;
}
nav{
  width: 100%;
  height: 50px;
  background-color: #0005;
  line-height: 50px;
}
nav ul{
  float: right;
  margin-right: 30px;
}
nav ul li{
  list-style-type: none;
  display: inline-block;
  transition: 0.7s all;
}
nav ul li:hover{
  background-color:#088;
}
nav ul li a{
  text-decoration: none;
  color: #fff;
  padding: 30px;
}
input{
	width: 200px;
}
.w3-bar-item{
	font-size: xx-large;
}
.center{
	text-align: center;
}
</style>
<body>
<div id="abc">
    <nav>
        <ul>
            <li><a href="#">Discover</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">Airways</a></li>
        </ul>
    </nav>
</div>
<h1>List of Transaction</h1>
<hr>
<div class="w3-bar w3-border w3-light-grey">
  <div class="w3-bar-item">Filter : </div>
  <br>
  <form method = "POST">
  <input type="date" name="date" placeholder="Date..">
  <input type = "text" name = "details" placeholder="Details..">
  <input type="text" name="depo" placeholder=" Deposite..">
        <input type="text" name="wit" placeholder="Withdrawal..">
        <input type="text" name="bal" placeholder=" Balance..">
		<input type="text" name="type" placeholder="Type..">
		<br>
        <button name = "apply" class = "center" type="submit">Apply</button>
  </form>
</div>
<br>
<br>
	<?php 
		$count = 0;
		if(isset($_POST['apply']))
		{
			$date = $_POST["date"];
			$details = $_POST["details"];
			$depo = $_POST["depo"];
			$wit = $_POST["wit"];
			$bal = $_POST["bal"];
			$type = $_POST["type"];
			$file = fopen("transaction_details.csv", "r");
			echo "<table>";
			echo "<tr><th>Date</th><th>Detail</th><th>Deposit</th><th>Withdrawal</th><th>Balance</th><th>Type</th>";
			while (!feof($file)) 
			{
				$inst_array = (fgetcsv($file));
				//print_r($inst_array);
				echo "$depo";
				if(is_countable($inst_array))
				{
					if($details == $inst_array[1] or $date == $inst_array[0] or $depo <= $inst_array[2] or $wit <= $inst_array[3] or $bal <= $inst_array[4] or $type == $inst_array[5] )
					{
						$count+=1;
						echo "<tr>";
						for($i=0;$i<count($inst_array);$i++)
						{
							echo "<td>$inst_array[$i]</td>";
						}
						echo "</tr>";
					}
				}
			}
			echo "</table>";
			if($count  == 0)
			{
				echo "<h2><center>NO RESULTS FOUND</center></h2>";
			}
			else
			{
				echo "<h2><center>TOTAL NO OF RESULTS : $count</center></h2>";
			}
			fclose($file);
		}
	?>
</body>
</html>