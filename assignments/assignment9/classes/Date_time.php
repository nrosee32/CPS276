<?php
require_once "Pdo_methods.php";

class Date_time {

    public function checkSubmit() {
        $response = "";
        if (isset( $_POST["addNote"])){
            $response = $this->addNote();
        }        
        if (isset( $_POST["displayNotes"])){
            $response = $this->getNotes();
        }        
        return $response;
    }    
    public function addNote() {
        $note = $_POST["note"];
        $date_time = $_POST["dateTime"];
        if($note === null || trim($note) === '' || $date_time === null || trim($date_time) === '') {
            return $this->displayError(true);
        } else {
            $pdo = new PdoMethods();
            $unformatted_timestamp = strtotime($date_time);
            $formatted_timestamp = date('Y-m-d H:s:m', $unformatted_timestamp);

            $sql = "INSERT INTO note (note, date_time) VALUES (:note,:date_time)";
            $bindings = [
                [':note',$note,'str'],
                [':date_time',$formatted_timestamp,'str']
            ];
        
            $result = $pdo->otherBinded($sql, $bindings);
            if($result === 'error'){
                return $this->displayError(false);
            }
    
            return $this->displayThanks();
        }
    }

    public function getNotes() {
        $begin_date = $_POST["begDate"];
        $end_date = $_POST["endDate"];
        if($begin_date === null || trim($begin_date) === '' || $end_date === null || trim($end_date) === '') {
            return $this->displayNotesError(true);
        } else {
            $pdo = new PdoMethods();
            $unformatted_begin_timestamp = strtotime($begin_date);
            $formatted_begin_timestamp = date('Y-m-d H:s:m', $unformatted_begin_timestamp);

            $unformatted_end_timestamp = strtotime($end_date);
            $formatted_end_timestamp = date('Y-m-d H:s:m', $unformatted_end_timestamp);

            $sql = "SELECT date_time, note FROM note WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC";

            $bindings = [
                [':begDate',$formatted_begin_timestamp,'str'],
                [':endDate',$formatted_end_timestamp,'str']
            ];
        
            $result = $pdo->selectBinded($sql, $bindings);
            if($result === 'error'){
                return $this->displayNotesError(false);
            }
            return $this->displayNotes($result);
        }
    }

    public function displayNotes($result) {
        $return_html = '<table><tr><th>Date and Time</th><th>Note</th></tr>';
        if(count($result) != 0){
            foreach($result as &$row) {
                $unformatted_date = strtotime($row["date_time"]);
                $this_date = date('m/d/y h:i A',$unformatted_date);
                $this_note = $row["note"];
                $new_html = '<tr><td>'.$this_date.'</td><td>'.$this_note.'</td></tr>';
                $return_html = $return_html.$new_html;
            }
            $return_html = $return_html.'</table>';
        } else {
            $return_html = "<p>No Results To Display</p>";
        }
        return <<<HTML
            $return_html
        HTML; 
    }

    function displayThanks() {
        return <<<HTML
            <h1>Thank You!</h1>
            
            <p>Your note was successfully saved</p>
        HTML;            
    }    

    function displayError($missingFields) {
        if($missingFields) {
            return <<<HTML
                <p>Please enter date, time, and note</p>
            HTML;
        } else {
            return <<<HTML
                <p>There was an error entering your note into the database</p>
            HTML;
        }
    }    

    function displayNotesError($missingFields) {
        if($missingFields) {
            return <<<HTML
                <p>Please enter beginning date and ending date</p>
            HTML;
        } else {
            return <<<HTML
                <p>There was an error getting notes from the database</p>
            HTML;
        }
    }        
}

?>