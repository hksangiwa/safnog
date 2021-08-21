<?php

class ShowAttendees
{

public static function showAttendeeTable()
{
    $json=file_get_contents("https://dev.iweek.org.za/json/attendees");
    $data =  json_decode($json);
    $attendee_table = "";
    if (count($data->Attendee)) {
	    $attendee_table .= "<table>";
	    $attendee_table .= '<thead>';
	    $attendee_table .= '<tr>';
	    $attendee_table .= '<th>Name</th>';
	    $attendee_table .= '<th>Surname</th>';
	    $attendee_table .= '<th>Company</th>';
	    $attendee_table .= '</tr>';
	    $attendee_table .= '</thead>';
	    $attendee_table .= '<tbody>';
        foreach ($data->Attendee as $idx => $attendee) {
		$attendee_table .= "<tr>";
		$attendee_table .= "<td>".$attendee->Name."</td>";
                $attendee_table .= "<td>".$attendee->Surname."</td>";
	        $attendee_table .= "<td>".$attendee->Company."</td>";
	        $attendee_table .= "</tr>";
        }
        $attendee_table .= "</tbody>";
        $attendee_table .= "</table>";
    }
    return $attendee_table;
}
}

?>
