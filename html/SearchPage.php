<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webarchive";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect!");

}

$nameSearch = '';
$majorSearch = '';
$yearSearch = '%';
$semesterSearch = '%';

if (isset($_GET['name']) && $_GET['name'] != '') { 
	$nameSearch = mysqli_real_escape_string($con, $_GET['name']);
}
if (isset($_GET['degree']) && $_GET['degree'] != 'none') { 
	$majorSearch = mysqli_real_escape_string($con, $_GET['degree']);
}
if (isset($_GET['year']) && $_GET['year'] != 'none') { 
	$yearSearch = mysqli_real_escape_string($con, $_GET['year']);
}
if (isset($_GET['semester']) && $_GET['semester'] != 'none') {
	$semesterSearch = mysqli_real_escape_string($con, $_GET['semester']);
}

$query = "select * from graduates where name like '%$nameSearch%' and major like '%$majorSearch%' and gradYear like '$yearSearch' and gradSemester like '$semesterSearch'";

$result = mysqli_query($con, $query);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CECS Graduates</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/SearchPage.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
<div id="mainWrapper">
  <header> 
    <!-- This is the header content. It contains Logo and links -->
	<a href = "homepage.php" id=logo>	
		<div id="logo"> <!-- <img src="logoImage.png" alt="sample logo"> --> 
			<img src="../resources/Header_Logo.png" alt="sample logo">
		</div>
	</a>
</header>
  <form action="searchpage.php" id="search-form" method ="get">
	  <label for="name"></label>
	  <input type="text" id="name" placeholder="Enter Name" name="name">
	  
	  <label for="degree"></label>
	  <select id="degree" name="degree">
		  <option value ="none">Select Degree</option>
		  <option value ="artificial-intelligence">Artificial Intelligence</option>
		  <option value ="bioengineering">Bioengineering</option>
		  <option value ="CMATH">CIS Mathematics</option>
		  <option value ="engineering-mathematics">Engineering Mathematics</option>
		  <option value ="artificial-intelligence">Artificial Intelligence</option>
		  <option value ="BSCIS">Computer Science</option>
		  <option value ="data-science">Data Science</option>
		  <option value ="BSSE">Software Engineering</option>
		  <option value ="cyber-security">Cybersecurity</option>
		  <option value ="BSECE">Computer Engineering</option>
		  <option value ="BSEEE">Electrical Engineering</option>
		  <option value ="Industrial-engineering">Industrial Engineering</option>
		  <option value ="BSEME">Manufacturing Engineering</option>
		  <option value ="mechanical-engineering">Mechanical Engineering</option>
		  <option value ="robotics-engineering">Robotics Engineering</option>
		  <option value ="human-centered-engineering-design">Human Centered Engineering Design</option>
		  
	  </select>
	  
	  <label for="year"></label>
	  <select id="year" name="year">
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
	  
	  <button type="submit" id="search-button">Search</button>
  </form>
	
	<div class="graduate">
		
	</div>
</div>
	<div class = "graduate-list">
	
		<?php
		
		if (mysqli_num_rows($result) > 0) {
			
		
			while ($graduate = mysqli_fetch_assoc($result)) {
			
				$name = $graduate['name'];
				$gradSemester = $graduate['gradSemester'];
				$gradYear = $graduate['gradYear'];
				$major = $graduate['major'];
				$photoAddress = $graduate['photoAddress'];
			
		
		//following is repeated for each row in the Graduates table
		?>
		<a href = "profilepage.php?id=<?php echo $graduate['gradID']; ?>" style="color: black; text-decoration: none;">
		<div class = "graduate">
			<img src="<?php echo htmlspecialchars($photoAddress); ?>" width="200" height="300">
			<h2><?php echo htmlspecialchars($name); ?></h2>
			<p>Graduated: <?php echo htmlspecialchars($gradSemester); ?> <?php echo htmlspecialchars($gradYear); ?></p>
			<p>Major: <?php echo htmlspecialchars($major); ?></p>
		</div>
		</a>
		<?php
			}
		} else {
			echo "No results found.";
		}
		?>
	</div>
	
	<script src = "../script.js"></script>
	
	<script>
	//PHP code to embed graduate data
		<?php
		$graduateData = [
			[
				"name" => "Graduate Name",
				"photo"=> "grad_photo",
				"year"=> "2004",
				"semester"=>"Summer",
				"major"=>"Computer Science"
			]
		];
		?>
		//generate graduate profile to add to graduate list
		function createGraduateElement(graduate){
			return '
				
			
				';
		}
		
		//update graduate list with created elements
		function updateGraduateList(){
			const graduateList = document.querySelector('.graduate-list');
			
			$graduateData.forEach(graduate =>{
				const graduateElement = createGraduateElement(graduate);
				graduateList.insertAdjacentHTML('beforeend', graduateElement);
			});
		}
	</script>
</body>
</html>

