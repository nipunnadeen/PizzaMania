<?php
include APPPATH . 'libraries/ShoppingCart.php';

class OrderReview extends CI_controller
{
	public function index()
	{
		$object = new ShoppingCart();
		$cartData['cartDetails'] = $object->contents();

		$this->load->view('templates/header');
		$this->load->view('pages/shoppingCart', $cartData);
		$this->load->view('templates/footer');
	}

	public function removeProduct()
	{
		$removeData = $this->input->post();

		$object = new ShoppingCart();
		$object->removeItem($removeData['remove']);
		redirect('cart');
	}

	public function clearCart()
	{
		$object = new ShoppingCart();
		$object->cleanCart();
		redirect('cart');
	}

	public function placeOrder()
	{
		$data['placeOrderData'] = $this->input->post();
		$object = new ShoppingCart();
		$object->cleanCart();
		$this->load->view('templates/header');
		$this->load->view('pages/placeOrder', $data);
		$this->load->view('templates/footer');
	}

	public function increaseQuantity()
	{
		$increaseQty = $this->input->post();
		$object = new ShoppingCart();
		$object->increaseItemQuantity($increaseQty["uuid"], $increaseQty["qty"]);
		redirect('cart');
	}

}
