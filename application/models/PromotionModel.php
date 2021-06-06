<?php

class PromotionModel extends CI_Model
{
	public function ___construct()
	{
		$this->load->database();
	}

	/**
	 * Gets all promotion details from database
	 * @return type
	 */
	public function getPromotionsDetails()
	{
		$query = $this->db->get('promotion');
		return $query->result_array();
	}
}
