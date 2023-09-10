<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webarchive";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect!");

}

$query = "select * from graduates";

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
    <div id="logo"> <!-- <img src="logoImage.png" alt="sample logo"> --> 
      <img src="../resources/Header_Logo.png" alt="sample logo">
		<!-- Company Logo text --> 
       </div>
</header>
  <div id="search-form">
	  <label for="name"></label>
	  <input type="text" id="name" placeholder="Enter Name" name="name">
	  
	  <label for="degree"></label>
	  <select id="degree" name="degree">
		  <option value ="none">Select Degree</option>
		  <option value ="artificial-intelligence">Artificial Intelligence</option>
		  <option value ="bioengineering">Bioengineering</option>
		  <option value ="cis-mathematics">CIS Mathematics</option>
		  <option value ="artificial-intelligence">Artificial Intelligence</option>
	  </select>
	  
	  <label for="year"></label>
	  <select id="year">
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
            <select id="semester">
                <option value="none">Select Semester</option>
                <option value="Spring">Spring</option>
                <option value="Fall">Fall</option>
				<option value="Summer">Summer</option>
            </select>
	  
	  <button id="search-button">Search</button>
  </div>
	
	<div class="graduate">
		
	</div>
</div>
	<div class = "graduate-list">
	
		<?php
		while ($graduate = mysqli_fetch_assoc($result)) {
			
			$name = $graduate['name'];
			$gradSemester = $graduate['gradSemester'];
			$gradYear = $graduate['gradYear'];
			$major = $graduate['major'];
			$photoAddress = $graduate['photoAddress'];
		
		//following is repeated for each row in the Graduates table
		?>
		<div class = "graduate">
			<img src="<?php echo htmlspecialchars($photoAddress); ?>" width="200" height="300">
			<h2><?php echo htmlspecialchars($name); ?></h2>
			<p>Graduated: <?php echo htmlspecialchars($gradSemester); ?> <?php echo htmlspecialchars($gradYear); ?></p>
			<p>Major: <?php echo htmlspecialchars($major); ?></p>
		</div>
		<?php
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

