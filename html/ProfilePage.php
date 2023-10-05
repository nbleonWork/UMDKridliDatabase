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
		<div class="logo"> <!-- <img src="logoImage.png" alt="sample logo"> --> 
			<img src="../resources/Header_LogoStretch.jpg" alt="header logo">
	
		</div>
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
			<button id="editButton">Edit Bio</button>
	
			
		</main>
	</div>

<div class="popup" id= "bioPopup">
	<div class = "popup-content">
		<button type="button" id="closePopup">&times;</button>
		<h2>Edit Profile</h2>
		<form id = "editForm">
			<label for="contactInfo">Contact Information</label>
			<ul id="contactInfo">
				<li>alumni@email.com</li>
			</ul>
			<button type = "button" id="addContact">Add Contact</button>
			<br>
			<label for="miscInfo">General Information:</label>
			<textarea id=miscellaneousInformation name=miscInfo>Bio: Current occupation, any miscellaneous accomplishments, general career.</textarea>
			<br>
			<label for "uniqname">Uniqname:</label>
			<input type = "text" id="uniqname" name = "uniqname" required>
			<label for "password">Password:</label>
			<input type = "text" id="password" name = "password" required>
			<button type = "button" id="submitRevisions">Submit</button>
		</form>
	</div>
	
</div>
	
</body>
</html>

