<?php
	define("SPACES", "/ [ ]*/"); //regex for parsing files with spaces
	define("TABS", "/\h/"); //regex for parsing files with tabs

	//constants parsing files
	define("VCL", "VCL");
	define("DCL", "DCL");
	define("SDR", "SDR");
	define("H", "\nH ");

	$file_contents = file_get_contents("resources/stations.json");
	$data = json_decode($file_contents, true);
	
	$filePath = $data["array"][0]["fileLocation"];
	
	showForm($filePath);

	if (isset($_POST["loadButton"])) {
		if (isset($_POST["fileSelect"])) {
			$fileName = $_POST["fileSelect"];
			include("loadData.php");
			unset($_POST["fileSelect"]);
		}
		else {
			alert("Oops, please pick a file first!");
		}
	}
	
// Functions
	function showForm($path) {
		echo "
		<form method=\"post\" name=\"formSubmit\">
			<select name=\"fileSelect\" size=1>";
				$files = glob($path . '*.sdr');
				foreach ($files as $file) 
				{
					$fileVal = pathinfo($file, PATHINFO_BASENAME);
					echo "<option value=\"$fileVal\">".pathinfo($file, PATHINFO_BASENAME)."</option>";			
				}
		echo "</select>
			<input name=\"loadButton\" type=\"submit\" value=\"Load File\"/>
		</form>";
	}
?>
