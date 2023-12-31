<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webarchive";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect!");

}

$query = "select * from graduates order by rand() limit 100";

$result = mysqli_query($con, $query);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>HomePage</title>
<link href="../css/HomePage.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div id="logo"> 
      		<img src="../resources/Header_Logo.png" alt="sample logo">
		
       </div>
	</header>
	
	<div class="container">
		<div class="image-container">
			<div class="image-slide">
				<!-- images go here-->
				<?php
				while ($grad = mysqli_fetch_assoc($result)) {
					$link = $grad['photoAddress'];
				?>
				<img src="<?php echo htmlspecialchars($link); ?>" />
				<?php
				}
				?>
			</div>
		
		</div>
		
		
		<div class="sidebar">
			<form action="searchpage.php" id="search-form" method ="get">
			<label for="name"></label>
	  		<input type="text" id="name" placeholder="Enter Name" name="name">
			<br>
			
			<label for="degree"></label>
	  		<select id="degree" name="degree">
		  		<option value ="none">Select Degree</option>
				<option value ="CMATH">CIS Mathematics</option>
				<option value ="BSCIS">Computer Science</option>
				<option value ="BSSE">Software Engineering</option>
				<option value ="BSECE">Computer Engineering</option>
				<option value ="BSEEE">Electrical Engineering</option>
				<option value ="BSEISE">Industrial Systems Engineering</option>
				<option value ="BSE-MFGE">Manufacturing Systems Engineering</option>
				<option value ="BSEME">Mechanical Engineering</option>
	  		</select>
			<br>
			
			<label for="year"></label>
	  		<select name="year">
			<option value="none">Select Year</option>
			<!-- Call the dynamic function to populate years -->
			<script>
				function populateYears() {
					const currentYear = new Date().getFullYear();
					const startYear = 2000; // Specify the starting year as needed
					for (let year = currentYear; year >= startYear; year--) {
						document.write('<option value="' + year + '">' + year + '</option>');
					}
				}
				populateYears();
			</script>
	  		</select>
			
			<label for="semester"></label>
            <select id="semester" name="semester">
                <option value="none">Select Semester</option>
                <option value="Winter">Winter</option>
                <option value="Fall">Fall</option>
				<option value="Summer">Summer</option>
            </select>
	  		<br>
			
	  		<button type="submit" id="search-button">Search</button>
			</form>
		</div>
	</div>	
	
</body>
</html>
