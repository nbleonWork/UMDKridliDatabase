<?php

	session_start();
	
	if(!isset($_SESSION['loggedIn'])) {
		header("location: AdminLogin.php");
	}
	
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "webarchive";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("failed to connect!");

}

$query = "";

//if a revision button was clicked
if (isset($_GET['approval'])) {
	$approval = $_GET['approval'];
	$id = $_GET['id'];
	if ($approval == 1) {
		$query = "update bios set approvalStatus = 1 where bioID = $id";
	} else {
		$query = "delete from bios where bioID = $id";
	}
	
	mysqli_query($con, $query);
	//remove when testing GET variables
	header("location: admindashboard.php");
}

//if a report button was clicked
if (isset($_GET['resolvedReportID'])) {
	$resolvedReportID = $_GET['resolvedReportID'];
	
	
	if (isset($_GET['remove'])) {
		$query = "delete from reports where reportID = $resolvedReportID";
		mysqli_query($con, $query);
	
		$reportedBioID = $_GET['reportedBioID'];
		$query = "delete from bios where bioID = $reportedBioID";
		mysqli_query($con, $query);
	}
	
	if (isset($_GET['dismiss'])) {
		$query = "delete from reports where reportID = $resolvedReportID";
		mysqli_query($con, $query);
	}
	
	//remove when testing GET variables
	header("location: admindashboard.php");
}

$query = "select * from bios where approvalStatus = 0";

$result = mysqli_query($con, $query);


$reportquery = "select * from reports where isSolved = 0";

$reportresult = mysqli_query($con, $reportquery);



?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisions and Reports</title>
    <!-- Include your CSS stylesheet here -->
<link href="../css/AdminDashboard.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="tabs">
    <div class="tab active" onclick="switchTab('revisions')">Revisions</div>
    <div class="tab" onclick="switchTab('reports')">Reports</div>
</div>

<div id="revisions" style="display: none;"> <!--class="table-container"-->
    <table id="revisionsTable">
        <thead>
            <th>Profile</th>
            <th>New Profile Bio</th>
            <th>Action</th>
        </thead>
        <tbody>
			<?php
			while ($bio = mysqli_fetch_assoc($result)) {
			
			$bioID = $bio['bioID'];
			$gradID = $bio['gradID'];
			$contactInfo = $bio['contactInfo'];
			$miscInfo = $bio['miscInfo'];
			
			$query = "select * from graduates where gradID = $gradID";
			$result2 = mysqli_query($con, $query);
			$grad = mysqli_fetch_assoc($result2);
			
			$gradName = $grad['name'];
			
			// section repeats for each unresolved entry in the Bios table
			?>
			<tr>
				<td><?php echo htmlspecialchars($gradName); ?></td>
				<td>
					Contact Info:<br> 
					<?php echo htmlspecialchars($contactInfo); ?><br>
					<br>
					Bio:<br>
					<?php echo htmlspecialchars($miscInfo); ?>
				</td>
				<td>
					<form action="admindashboard.php" method="get">
						<input type='hidden' name='id' value='<?php echo $bioID;?>'>
						<input type='hidden' name='approval' value=1>
						<button type="submit">Accept</button>
					</form>
                    <form action="admindashboard.php" method="get">
						<input type='hidden' name='id' value='<?php echo $bioID;?>'>
						<input type='hidden' name='approval' value=0>
						<button type="submit">Reject</button>
					</form>
				</td>
			</tr>
			<?php
			}
			?>
        </tbody>
    </table>
</div>

<div id="reports">
    <table id="reportsTable">
        <thead>
            <th>Profile</th>
			<th>Reported Bio</th>
            <th>Report Reason</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
			while ($report = mysqli_fetch_assoc($reportresult)) {
			
			$reportID = $report['reportID'];
			$reportBioID = $report['bioID'];
			$reportContent = $report['reportContent'];
			
			//get reported bio's content
			$reportedBioQuery = "select * from bios where bioID = $reportBioID";
			$reportedBioResult = mysqli_query($con, $reportedBioQuery);
			$reportedBio = mysqli_fetch_assoc($reportedBioResult);
			
			$reportedGradID = $reportedBio['gradID'];
			$reportedContactInfo = $reportedBio['contactInfo'];
			$reportedMiscInfo = $reportedBio['miscInfo'];
			
			//get graduate's name
			$reportedGradQuery = "select * from graduates where gradID = $reportedGradID";
			$reportedGradResult = mysqli_query($con, $reportedGradQuery);
			$reportedGrad = mysqli_fetch_assoc($reportedGradResult);
			
			$reportedGradName = $reportedGrad['name'];
			
			// section repeats for each unresolved entry in the Bios table
			?>
			<tr>
				<td><?php echo htmlspecialchars($reportedGradName); ?></td>
				<td>
					Contact Info:<br> 
					<?php echo htmlspecialchars($reportedContactInfo); ?><br>
					<br>
					Bio:<br>
					<?php echo htmlspecialchars($reportedMiscInfo); ?>
				</td>
				<td><?php echo htmlspecialchars($reportContent); ?></td>
				<td>
					<form action="admindashboard.php" method="get">
						<input type='hidden' name='resolvedReportID' value='<?php echo $reportID;?>'>
						<input type='hidden' name='reportedBioID' value=<?php echo $reportBioID;?>>
						<input type='hidden' name='remove' value=1>
						<button type="submit">Remove Bio</button>
					</form>
                    <form action="admindashboard.php" method="get">
						<input type='hidden' name='resolvedReportID' value='<?php echo $reportID;?>'>
						<input type='hidden' name='dismiss' value=1>
						<button type="submit">Dismiss Report</button>
					</form>
				</td>
			</tr>
			<?php
			}
			?>
        </tbody>
    </table>
</div>

<div id="fixPopup" class="popup">
    <table>
        <thead>
            <th>Timestamp</th>
            <th>Text Content</th>
            <th>Action</th>
        </thead>
        <tbody id="fixPopupTableBody">
            <!-- Rows will be dynamically added here -->
        </tbody>
    </table>
    <div class="button-container">
        <button onclick="done()">Done</button>
        <button onclick="closePopup()">Close</button>
    </div>
</div>

<script>
    let currentFixRow; // Variable to store the current row for fix
	
	if (sessionStorage.getItem('tab') == null) {
		switchTab('revisions');
	} else {
		switchTab(sessionStorage.getItem('tab'));
	}

    function switchTab(tabName) {
		window.sessionStorage.setItem('tab', tabName);
	
        document.getElementById('revisions').style.display = tabName === 'revisions' ? 'block' : 'none';
        document.getElementById('reports').style.display = tabName === 'reports' ? 'block' : 'none';

        // Make the clicked tab active
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => tab.classList.remove('active'));
        document.querySelector(`.${tabName}`).classList.add('active');
    }

    function accept(element) {
        const row = element.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function reject(element) {
        const row = element.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function fix(element) {
        const row = element.parentNode.parentNode;
        const fixPopup = document.getElementById('fixPopup');
        fixPopup.style.display = 'block';
        // Populate the fixPopup with data based on the clicked row
        currentFixRow = row; // Store the current row for fix
        // ...
    }

    function discard(element) {
        const row = element.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    function revert(element) {
        // Implement logic for reverting changes in the fixPopup
        // ...
    }

    function done() {
        const fixPopup = document.getElementById('fixPopup');
        fixPopup.style.display = 'none';

        // Delete the row from which the fix button was clicked
        if (currentFixRow) {
            currentFixRow.parentNode.removeChild(currentFixRow);
            currentFixRow = null; // Reset currentFixRow after deletion
        }
    }

    function closePopup() {
        const fixPopup = document.getElementById('fixPopup');
        fixPopup.style.display = 'none';
    }

    // For demonstration purposes, let's create some sample rows
    //const revisionsTable = document.getElementById('revisionsTable').getElementsByTagName('tbody')[0];
    //const reportsTable = document.getElementById('reportsTable').getElementsByTagName('tbody')[0];
	
	/*
    for (let i = 1; i <= 5; i++) {
        const revisionsRow = revisionsTable.insertRow();
        const revisionsCell1 = revisionsRow.insertCell(0);
        const revisionsCell2 = revisionsRow.insertCell(1);
        const revisionsCell3 = revisionsRow.insertCell(2);

        revisionsCell1.innerHTML = `Name ${i}`;
        revisionsCell2.innerHTML = `Submitted Text ${i}`;
        revisionsCell3.innerHTML = `<button onclick="accept(this)">Accept</button>
                                   <button onclick="reject(this)">Reject</button>`;
    }
	*/
    /*for (let i = 1; i <= 5; i++) {
        const reportsRow = reportsTable.insertRow();
        const reportsCell1 = reportsRow.insertCell(0);
        const reportsCell2 = reportsRow.insertCell(1);
        const reportsCell3 = reportsRow.insertCell(2);

        reportsCell1.innerHTML = `Name ${i}`;
        reportsCell2.innerHTML = `Report ${i}`;
        reportsCell3.innerHTML = `<button onclick="fix(this)">Fix</button>
                                  <button onclick="discard(this)">Discard</button>`;
    }*/
</script>	

</body>
</html>