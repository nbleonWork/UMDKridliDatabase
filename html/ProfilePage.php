<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webarchive";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect!");

}

$id = 1;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
}

//pull up graduate information:
$query = "select * from graduates where gradID = $id";

$result = mysqli_query($con, $query);

$graduate = mysqli_fetch_assoc($result);

$gradID = $graduate['gradID'];
$name = $graduate['name'];
$gradSemester = $graduate['gradSemester'];
$gradYear = $graduate['gradYear'];
$major = $graduate['major'];
$photoAddress = $graduate['photoAddress'];


//set default bio information
$bioID = -1;
$foundContactInfo = "alumni@email.com";
$foundMiscInfo = "Current occupation, any miscellaneous accomplishments, general career.";

$query = "select * from bios where gradID = $id and approvalStatus = 1";
$result = mysqli_query($con, $query);

//find the bio table entry with the highest bioID
if ($bio = mysqli_fetch_assoc($result)) {
	while ($bioResult = mysqli_fetch_assoc($result)) {
		if ($bioResult['bioID'] > $bio['bioID']) {
			$bio = $bioResult;
		}
	}
	
	//found a bio with the highest ID
	$bioID = $bio['bioID'];
	$foundContactInfo = $bio['contactInfo'];
	$foundMiscInfo = $bio['miscInfo'];
}


$query = "";

//contactInfo is set from this page being navigated to; implies that a bio was submitted
if (isset($_GET['contactInfo'])) {
	$contactInfo = mysqli_real_escape_string($con, $_GET['contactInfo']);
	$miscInfo = mysqli_real_escape_string($con, $_GET['miscInfo']);
	$query = "insert into bios (gradID, contactInfo, miscInfo, approvalStatus) values ('$gradID', '$contactInfo', '$miscInfo', 0);";
}

if (isset($_GET['reportInfo']) && $bioID > -1) {
	$reportInfo = mysqli_real_escape_string($con, $_GET['reportInfo']);
	$query = "insert into reports (bioID, reportContent, isSolved) values ('$bioID', '$reportInfo', 0);";
}

if ($query != "") {
	$result = mysqli_query($con, $query);
}




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
					<li><?php echo htmlspecialchars($foundContactInfo); ?></li>
				</ul>
				
			<div class = "miscInfo">
				<p>Bio: <?php echo htmlspecialchars($foundMiscInfo); ?></p>
			</div>
			<button id="editButton" onClick="openEditForm()">Edit Bio</button>
			<button id="reportButton" onClick="openReportForm()">Report</button>
			
	
			
		</main>
	</div>

<div class="bioPopup" id= "editBio">
	<div class = "popup-content">
		<button type="button" id="closePopup" onClick="closeEditForm()">&times;</button>
		<h2>Edit Profile</h2>
		<form action="profilepage.php" id="editForm" method="get">
			<input type='hidden' name='id' value='<?php echo $id;?>'>
			<label for="contactInfo">Contact Information:</label>
			<br>
			<textarea id="contactInfo" name="contactInfo" form="editForm">alumni@email.com</textarea>
			
			<br>
			<label for="miscInfo">General Information:</label>
			<br>
			<textarea id="miscellaneousInformation" name="miscInfo" form="editForm">Bio: Current occupation, any miscellaneous accomplishments, general career.</textarea>
			<br>
			
			<button type="submit" id="submitRevisions">Submit</button>
		</form>
	</div>
	
	
</div>
	

<div class="reportPopup" id= "reportBio">
	<div class = "popup-content">
		<button type="button" id="closePopup" onClick="closeReportForm()">&times;</button>
		<h2>Report Profile</h2>
		<form action="profilepage.php" id="reportForm" method="get">
			<input type='hidden' name='id' value='<?php echo $id;?>'>
			<label for="reportInfo">What's Wrong?</label>
			<br>
			<textarea id="reportInformation" name="reportInfo" form="reportForm"></textarea>
			<br>
			
			<button type="submit" id="submitReport">Submit</button>
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

