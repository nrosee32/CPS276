<?php
require 'Pdo_methods.php';

class DataProc extends PdoMethods{

	public function getNames($type){
		
		/* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
		$pdo = new PdoMethods();

		/* CREATE THE SQL */
		$sql = "SELECT * FROM PDF_Table";

		//PROCESS THE SQL AND GET THE RESULTS
		$records = $pdo->selectNotBinded($sql);

		/* IF THERE WAS AN ERROR DISPLAY MESSAGE */
		if($records == 'error'){
			return 'There has been and error processing your request';
		}
		else {
			if(count($records) != 0){
				if($type == 'list'){return $this->createList($records);}
			}
			else {
				return 'no files found';
			}
		}
	}

	public function addFile($filename, $filepath){
	
		$pdo = new PdoMethods();

		/* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
		$sql = "INSERT INTO PDF_Table (fileName, filePath) VALUES (:filename, :filepath)";

			 
	    /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
	    $bindings = [
			[':filename',$filename,'str'],
			[':filepath',$filepath,'str']
		];

		/* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
		$result = $pdo->otherBinded($sql, $bindings);

		/* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
		if($result === 'error'){
			return 'There was an error adding the file info';
		}
		else {
			return 'File info has been added';
		}
	}

	/*THIS FUNCTION TAKES THE DATA FROM THE DATABASE AND RETURN AN UNORDERED LIST OF THE DATA*/
	private function createList($records){
		$list = '<ul>';
		foreach ($records as $row){
			$list .= "<li><a href=\"{$row['filePath']}\" target=\"_blank\">{$row['fileName']}</a></li>";
		}
		$list .= '</ul>';
		return $list;
	}

}
?>