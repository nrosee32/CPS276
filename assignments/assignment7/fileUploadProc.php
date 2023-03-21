<?php
require_once "dataProc.php";

function processFile(){

    $newDirPath = "https://russet-v8.wccnet.edu/~nkesten/cps276/assignments/assignment7/pdf/";

    //I HAD TO MAKE $OUTPUT A GLOBAL VARIBLE SO IT COULD BE USED INSIDE AND OUTSIDE THIS FUNCTION
    global $output;

    // I PUT THE PDF INTO A DIRECTORY NAMED PDF WHICH IS ALREADY ON THE SERVER AND HAS 777 FILE PERMISSIONS
		
	//CHECK TO SEE IF A FILE WAS UPLOADED.  ERROR EQUALS 4 MEANS THERE WAS NO FILE UPLOADED
	if ($_FILES["pdf"]["error"] == 4){
		$output = "No file was uploaded. Make sure you choose a file to upload.";
	}

	/*MAKE SURE THE FILE SIZE IS LESS THAN 1000000 BYTES.  THE ERROR EQUALS ONE MEANS THE FILE WAS TOO BIG ACCORDING TO THE SETINGS IN
	post_max_size LOCATED IN THE PHP INI FILE.*/
	elseif($_FILES["pdf"]["size"] > 1000000 || $_FILES["pdf"]["error"] == 1){
		$output = "The pdf is too large";
	}

	//CHECK TO MAKE SURE IT IS THE CORRECT FILE TYPE IN THIS CASE JPEG OR PNG
	elseif ($_FILES["pdf"]["type"] != "application/pdf") {
		$output = "<p>PDF Files only, thanks!</p>";
	}

	//IF ALL GOES WELL MOVE FILE FROM TEMP LCOATION TO THE PDF DIRECTORY 
	elseif (!move_uploaded_file( $_FILES["pdf"]["tmp_name"], 'pdf/' . $_FILES["pdf"]["name"])){
			$output = "<p>Sorry, there was a problem uploading that pdf.</p>";
	}
	else {
		//IF ALL GOES WELL CALL DISPLAY THANKS METHOD
        //AND ADD FILE INFO TO THE DATABASE
        $myProcessor = new DataProc();
        $fileName = $_POST["fileName"];        
        $myProcessor->addFile($fileName, $newDirPath.$_FILES['pdf']['name']);
		$output = displayThanks();
	}

}

function displayThanks() {

/*
NOTICE I USE THE POST SUPERGLOBAL ARRAY TO GET THE NAME AND NOT
THE FLES SUPERGLOBAL ARRAY.  ALL FILES USE $_FILES ALL TEXT ENTERIES USE $_POST
*/

return <<<HTML
	<h1>Thank You!</h1>
	
	<p>Here's your pdf:</p>
	<p><a href="pdf/{$_FILES['pdf']['name']}" target="_blank">{$_FILES['pdf']['name']}</a></p>
HTML;
	
}

?>