<?php
include APPPATH . 'libraries/ShoppingCart.php';

class Promotion extends CI_controller
{
	public function index()
	{

		$data['promotions'] = $this->PromotionModel->getPromotionsDetails();
		$this->load->view('templates/header');
		$this->load->view('pages/promotion', $data);
		$this->load->view('templates/footer');
	}

	public function addProduct()
	{
		$promoDetails = $this->input->post();

		$itemData = array(
			"id" => $promoDetails['productId'],
			"name" => $promoDetails['productName'],
			"qty" => $promoDetails['productQuantity'],
			"price" => $promoDetails['productPrice']
		);

		$object = new ShoppingCart();
		$object->insertOrder($itemData);

		redirect('promotion');
	}
}
