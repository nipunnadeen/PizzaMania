<?php

class ShoppingCart
{
	protected $CI;
	protected $cartContents = array();

	public function __construct($params = array())
	{
		$this->CI =& get_instance();
		if ($this->cartContents === NULL) {
			$this->cartContents = array();
		}
		$this->cartContents = $this->CI->session->userdata('cartContents');
	}

	public function contents()
	{
		$this->grandTotal();
		return $this->cartContents;
	}

	/**
	 * calculate the values and insert the order details in to session array
	 */
	public function insertOrder($items = array())
	{
		$orderId = uniqid();
		$items['subtotal'] = ($items['price'] * $items['qty']);
		$items['uuid'] = $orderId;
		$true = array();
		if (!empty($this->cartContents)) {
			$extra = FALSE;
			//Identify the duplicate items and update the existing orders
			foreach ($this->cartContents as $content) {
				if ($content['name'] === $items['name']) {
					if (!empty($items['size'])) {
						if (count($items['topping']) === count($content['topping']) &&
							$content['size'] === $items['size']) {
							foreach ($content['topping'] as $oldElement) {
								foreach ($items['topping'] as $newElement) {
									if ($oldElement === $newElement) {
										array_push($true, true);
									}
								}
							}
							if (count($items['topping']) === count($true)) {
								$extra = $this->updateDuplicateItem($content['qty'], $items['qty'], $content['uuid'],
									$content['price']);
							}
						}
					} else {
						$extra = $this->updateDuplicateItem($content['qty'], $items['qty'], $content['uuid'],
							$content['price']);
					}
				}
			}
			if ($extra === FALSE) {
				$this->cartContents[$orderId] = $items;
				$this->CI->session->set_userdata(array('cartContents' => $this->cartContents));
			}
		} else {
			$this->cartContents[$orderId] = $items;
			$this->CI->session->set_userdata(array('cartContents' => $this->cartContents));
		}
	}

	/**
	 * Update the quantity & the sub total of the product for duplicate items
	 * @return boolean
	 */
	public function updateDuplicateItem($oldQty, $newQty, $uuid, $price)
	{
		$oldQty += $newQty;
		$this->cartContents[$uuid]["qty"] = $oldQty;
		$this->cartContents[$uuid]['subtotal'] = ($price * $oldQty);
		$this->CI->session->set_userdata(array('cartContents' => $this->cartContents));
		return TRUE;
	}

	public function grandTotal()
	{
		$this->cartContents['cartTotal'] = 0;
		foreach ($this->cartContents as $cartContent) {
			if ( ! is_array($cartContent) OR ! isset($cartContent['price'], $cartContent['qty']))
			{
				continue;
			}
			$this->cartContents['cartTotal'] += ($cartContent['price'] * $cartContent['qty']);
		}
		return $this->cartContents['cartTotal'];
	}

	/**
	 * Clean the cart
	 */
	public function cleanCart()
	{
		$this->cartContents = array('cartTotal' => 0, 'totalItems' => 0);
		$this->CI->session->unset_userdata('cartContents');
	}

	public function removeItem($orderId)
	{
		foreach ($this->cartContents as $content) {
			if ($content['uuid'] === $orderId) {
				unset($this->cartContents[$orderId]);
				$this->CI->session->set_userdata(array('cartContents' => $this->cartContents));
			}
		}
	}

	public function increaseItemQuantity($orderId, $qty)
	{
		foreach ($this->cartContents as $content) {
			if ($content['uuid'] === $orderId) {
				$this->cartContents[$content['uuid']]["qty"] = $qty;
				$this->cartContents[$content['uuid']]['subtotal'] = ($content['price'] * $qty);
				$this->CI->session->set_userdata(array('cartContents' => $this->cartContents));
			}
		}
	}
}
