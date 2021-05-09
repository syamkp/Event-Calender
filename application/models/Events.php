<?php

class Events extends CI_Model {

	public function add($date , $event_details)
	{
		$query = "INSERT INTO event VALUES(NULL, '$date', '$event_details')";
		$this->db->query($query);
	}

	public function get_by_date($date)
	{
		$result = array();

		$sql = "SELECT * FROM event WHERE date = '$date'";
		$query = $this->db->query($sql);

		foreach ($query->result() as $event) {
			$result[]= $event->event_details;
		}

		return $result;
	}

	public function get_all()
	{
		$result = array();

		$sql = "SELECT * FROM event";
		$query = $this->db->query($sql);

		foreach ($query->result() as $event) {
			$formated_date = date('m/d/Y', strtotime($event->date));
			$result[]= $formated_date;
		}

		return $result;
	}
}	