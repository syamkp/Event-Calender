<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function add()
	{ 
		$this->load->view('add_event');
	}

	public function save()
	{
		$event_details =  $this->input->post('event_details');
		$date =  $this->input->post('date');
		$format_date = date('Y-m-d',  strtotime($date));

		$this->load->model('events');
		$this->events->add($format_date, $event_details);

		echo "<script>window.close();</script>";
	}

	public function list()
	{
		$date =  $this->input->get('date');
		$format_date = date('Y-m-d',  strtotime($date));
		
		$this->load->model('events');
		$events = $this->events->get_by_date($format_date);

		foreach ($events as $event) {
			echo '<ul>';
			echo '<li>'.$event.'</li>';
			echo '</ul>';
		}
	}

	public function get_all()
	{
		$this->load->model('events');
		$events = $this->events->get_all(); 
		echo implode(',',$events); exit;
	}
}