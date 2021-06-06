<?php
include APPPATH . 'libraries/ShoppingCart.php';

class Side extends CI_controller
{
	public function index()
	{

		$data['sides'] = $this->HomeModel->getSidesDetails();

		$this->load->view('templates/header');
		$this->load->view('pages/sides', $data);
		$this->load->view('templates/footer');
	}

	public function addProduct()
	{
		$productDetails = $this->input->post();

		$itemData = array(
			"id" => $productDetails['productId'],
			"name" => $productDetails['productName'],
			"qty" => $productDetails['productQuantity'],
			"price" => $productDetails['productPrice']
		);

		$object = new ShoppingCart();
		$object->insertOrder($itemData);

		redirect('side');
	}
}
