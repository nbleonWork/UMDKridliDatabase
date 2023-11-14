<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webarchive";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect!");

}

$id = 1;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}


$query = "select * from graduates where gradID = $id";

$result = mysqli_query($con, $query);

$graduate = mysqli_fetch_assoc($result);

$name = $graduate['name'];
$gradSemester = $graduate['gradSemester'];
$gradYear = $graduate['gradYear'];
$major = $graduate['major'];
$photoAddress = $graduate['photoAddress'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graduate Profile - John Doe</title>
    <!-- Include your CSS stylesheet here -->
<link href="../css/ProfilePage.css" rel="stylesheet" type="text/css">
</head>
<body>
    

   <header>
	   <a href = "#" id=logo>		
			<img src="../resources/Header_Logo.png" alt="header logo">		
	   </a>
   </header>
	<div class = "content">
		<div class="profile">
			<img src="<?php echo htmlspecialchars($photoAddress); ?>" alt="GradPhoto">
			<!-- Add more profile information as needed -->
		</div>
	
		<main class="bio">
			<div class = "personalInfo">
				<h2><?php echo htmlspecialchars($name); ?></h2>
				<h2>Graduated: <?php echo htmlspecialchars($gradSemester); ?>, <?php echo htmlspecialchars($gradYear); ?></h2>
				<h2>Degree: <?php echo htmlspecialchars($major); ?></h2>
			</div>
			<div class= "contactInfo"></div>
				<ul id="contactList">
					<li>alumni@email.com</li>
				</ul>
			<div class = "miscInfo">
				<p>Bio: Current occupation, any miscellaneous accomplishments, general career.</p>
			</div>
			<button id="editButton" onClick="openEditForm()">Edit Bio</button>
			<button id="reportButton" onClick="openReportForm()">Report</button>
			
	
			
		</main>
	</div>

<div class="bioPopup" id= "editBio">
	<div class = "popup-content">
		<button type="button" id="closePopup" onClick="closeEditForm()">&times;</button>
		<h2>Edit Profile</h2>
		<form id = "editForm">
			<label for="contactInfo">Contact Information:</label>
			<br>
			<textarea id="contactInfo">alumni@email.com</textarea>
			
			<br>
			<label for="miscInfo">General Information:</label>
			<br>
			<textarea id=miscellaneousInformation name=miscInfo>Bio: Current occupation, any miscellaneous accomplishments, general career.</textarea>
			<br>
			
			<button type = "button" id="submitRevisions">Submit</button>
		</form>
	</div>
	
	
</div>
	

<div class="reportPopup" id= "reportBio">
	<div class = "popup-content">
		<button type="button" id="closePopup" onClick="closeReportForm()">&times;</button>
		<h2>Report Profile</h2>
		<form id = "reportForm">
			<label for="reportInfo">What's Wrong?</label>
			<br>
			<textarea id=reportInformation name=reportInfo></textarea>
			<br>
			
			<button type = "button" id="submitReport">Submit</button>
		</form>
	</div>
	</div>

<script>
	function openEditForm() {
		document.getElementById("editBio").style.display = "block";
	}
	
	function closeEditForm() {
		document.getElementById("editBio").style.display = "none";
	}
	
	function openReportForm() {
		document.getElementById("reportBio").style.display = "block";
	}
	
	function closeReportForm() {
		document.getElementById("reportBio").style.display = "none";
	}
	
	
</script>	
	
</body>
</html>

