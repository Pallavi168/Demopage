<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>HRIS Dashboard</title>
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    <link rel="stylesheet" href="dashboardstyle.css">
  <style>
    header {
	background: #008489;
	height: 60px;
	width: 100%;
	position: fixed;
}

header * {
	color: white;
}

header .logo {
	float: left;
	height: inherit;
	margin-left: 2em;
}

header .logo-text {
	margin: 8px;
}

header ul {
	float: right;
	margin: 0px;
	padding: 0px;
	list-style: none;
}

header ul li {
	float: left;
	position: relative;
}

header ul li a {
	display: block;
	padding: 18px;
	font-size: 1.1em;
	text-decoration: none;
}

header ul li a:hover {
	background: #006669;
	transition: 0.5s;
}


.view {
	height: calc(100vh - 60px);
}

.view .main {
	height: 100%;
	padding: 80px 100px 100px;
}

.main .page-title {
	text-align: center;
	margin-bottom: 1rem;
	color: #404040;
}

label {
	font-size: 15px;
	color: #404040;;
	padding: 4px;
}

input {
	border: 1px solid #ccc;
	padding: 3px;
}

button {
	background: #008489;
	padding: 5px 12px;
	color: white;
	font-size: 15px;
}

button:hover{
	opacity: .8;
}

table {
	width: 100%;
	border-collapse: collapse;
	font-size: 1rem;
	color: #404040;
}

th, td {
	padding: 14px;
	text-align: left;
	border-bottom: 1px solid #d3d3d3;
}
</style>
</head>

<body>
	<header>
		<div class="logo">
			<h1 class="logo-text">NCTC</h1>
		</div>
		
		<ul>
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="addprojects.php">Manage Project</a></li>
			<li><a href="assignprojects.php">Assign Project</a></li>
			<li><a href="lg.php">Logout</a></li>
			<li><a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-user"></i> Pallavisinha</a></li>
		</ul>
	</header>
	<div class="view">
		<div class="main">
			<form method="post" action="records.php">
				<div>
					<label>Search by Date: </label>
	      			<input type="date" name="date_from"/>
	      			<label>Search by Person: </label>
	      			<input type="text" name="name_from"/>
	      			<button type="submit" name="search">Search</button>
				</div>
			</form>
			<div class="content">
				<h2 class="page-title">HRIS Dashboard</h2>

				<?php
					$conn = odbc_connect('SQLServer', 'azureuser', 'Pallavirani1');

					if ($conn) {
					  # code...
					  echo "";
					}

					$query = "SELECT * FROM [dbo].[Task2]";
					$result = odbc_exec($conn, $query);

					if($result) {
				?>
					<div>
					  <table>
					    <thead>
					      <th>SN</th>
					      <th>Person</th>
					      <th>Date</th>
					      <th>Time</th>
					      <th>Client</th>
					      <th>Project</th>
					      <th>Module</th>
					      <th>Task</th>
					      <th>Worktype</th>
					      <!--<th>Billable</th>
					      <th>Description</th>-->
					    </thead>
					<?php
					  while($row = odbc_fetch_array($result)) {
					    ?>
					    <tbody>
					      <tr>
					      	<td><?php echo $row["Taskid"]; ?></td>
					        <td><?php echo $row["Person"]; ?></td>
					        <td><?php echo $row["Taskdate"]; ?></td>
					        <td><?php echo $row["Total_time"]; ?></td>
					        <td><?php echo $row["Client"]; ?></td>
					        <td><?php echo $row["Project"]; ?></td>
					        <td><?php echo $row["Module"]; ?></td>
					        <td><?php echo $row["Task"]; ?></td>
					        <td><?php echo $row["Worktype"]; ?></td>
					      </tr>
					    </tbody>
					<?php
					  }
					?>
					  </table>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>
