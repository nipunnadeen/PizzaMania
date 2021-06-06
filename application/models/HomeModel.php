<?php

class HomeModel extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Gets all pizzas details from database
	 * @return array
	 */
	public function getPizzaDetails()
	{
		$query = $this->db->get('pizza');
		return $query->result_array();
	}

	/**
	 * Gets all topping details from database
	 * @return array
	 */
	public function getToppingDetails()
	{
		$query = $this->db->get('pizzatopping');
		return $query->result_array();

	}

	/**
	 * Gets all sides details from database
	 * @return array
	 */
	public function getSidesDetails()
	{
		$query = $this->db->get('side');
		return $query->result_array();

	}

	public function generateSizeName($detail)
	{
		$pizzaDetail = explode(',', $detail);
		return $pizzaSize = $pizzaDetail[0];
	}

	public function generateSizePrice($detail)
	{
		$pizzaDetail = explode(',', $detail);
		return $productPrice = $pizzaDetail[1];
	}

	public function generateToppingName($detail)
	{
		$toppingList = array();
		foreach ($detail as $topping) {
			$toppingDetail = explode(',', $topping);
			array_push($toppingList, $toppingDetail[0]);
		}
		return $toppingList;
	}

	public function generateToppingPrice($detail)
	{
		$toppingPrice = 0;
		foreach ($detail as $topping) {
			$toppingDetail = explode(',', $topping);
			$toppingPrice += $toppingDetail[1];
		}
		return $toppingPrice;
	}
}
