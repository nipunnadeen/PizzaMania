<?php
include APPPATH . 'libraries/ShoppingCart.php';

class CustomizeMenu extends CI_controller
{
	public function index()
	{
		$data['pizzaDetails'] = $this->input->post();
		$data['toppings'] = $this->HomeModel->getToppingDetails();

		$this->load->view('templates/header');
		$this->load->view('pages/pizzaCustomize', $data);
		$this->load->view('templates/footer');
	}

	public function addProduct()
	{
		$customizePizzaDetails = $this->input->post();

        // get the size, size price, topping names & total of topping price
		$pizzaSize = $this->HomeModel->generateSizeName($customizePizzaDetails['productPrice']);
		$productPrice = $this->HomeModel->generateSizePrice($customizePizzaDetails['productPrice']);
		$toppingName = $this->HomeModel->generateToppingName($customizePizzaDetails['productTopping']);
		$toppingPrice = $this->HomeModel->generateToppingPrice($customizePizzaDetails['productTopping']);

		$itemData = array(
			"id" => $customizePizzaDetails['productId'],
			"name" => $customizePizzaDetails['productName'],
			"qty" => $customizePizzaDetails['productQuantity'],
			"price" => $productPrice + $toppingPrice,
			"size" => $pizzaSize,
			"topping" => $toppingName
		);

		$object = new ShoppingCart();
		$object->insertOrder($itemData);

		redirect('home');
	}
}

