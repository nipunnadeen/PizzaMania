<?php

class Home extends CI_controller
{
	public function index()
	{

		$data['pizzas'] = $this->HomeModel->getPizzaDetails();

		$this->load->view('templates/header');
		$this->load->view('pages/home', $data);
		$this->load->view('templates/footer');
	}
}
