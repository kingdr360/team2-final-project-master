<?php
session_start();
require_once('includes/session_in.inc.php');
try {
	require_once('includes/header.php');
	require_once('includes/nav.php');
	require_once('includes/footer.php');
	require_once('survey_results.cls.php');
	
} catch(Exception $e) {
	$error = $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Member Responses</title>
	<link href="css/style.css" rel="stylesheet" />
</head>
<body>
	<div class="fixedheader">
	<?php injectHeader(); ?>
	<?php
		$errMsg = "";
		$instanceId = false;
		$surveyName = '';
		
		// echo "<pre>"; print_r($_POST); echo "</pre>";
		if ($_SERVER['REQUEST_METHOD'] === "GET") {
			if (!empty($_GET['instance-id'])) {
				$instanceId = $_GET['instance-id'];
				$surveyName = $_GET['survey-name'];
			}
		}
	?>
	<?php injectNav("Dashboard > Survey Results: " . $surveyName); ?>
	</div>
	<main>
		<?php
			if (!empty($errMsg)) {
				injectDivError($errMsg);
			}
		?>
		<br>
		<?php SurveyResults::injectTeamTables($instanceId, $surveyName); ?>
	</main>
	<?php injectFooter(); ?>
</body>
</html>
