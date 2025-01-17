<?php
class Home_model extends CI_Model 
	{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getCountries()
		{
		$query = $this->db->get('countries');  // SELECT * FROM countries
		return $query->result_array();
	}
	
	public function getCity()
		{
		$query = $this->db->get('cities');
		return $query->result_array();
	}
	
	public function createCountry($country)
		{
			$data = array('country' => $country);
			$this->db->insert('countries', $data);// INSERT INTO countries (country) VALUES ($country)
	}
	
	public function deleteCountry($id)
		{
			$data = array('id' => $id);
			$this->db->delete('countries', $data);
	}
	
	public function createCity($countryid,$city)
		{
			$data = array('countryid' => $countryid, 'city' => $city);
			$this->db->insert('cities', $data);
	}
	
	public function deleteCity($id)
		{
			$data = array('id' => $id);
			$this->db->delete('cities', $data);
	}
	
	public function getCountryById($id, $asRow = true)
	{
		$query = $this->db->get_where('countries', array('id' => $id));
		return $asRow ? $query->row_array() : $query->result_array();
	}
	

	public function getCitiesById($id)
		{ 			
			$query = $this->db->get_where('cities', array('countryid' => $id));
			return $query->result_array();
	}

	public function getCityById($cityId)
	{
		$query = $this->db->get_where('cities', array('id' => $cityId));
		return $query->row_array();
	}

	public function getHotels()
		{
			$query = $this->db->get('hotels');
			return $query->result_array();
		}

	public function createHotel($data)
		{
			$this->db->insert('hotels', $data);
		}

	public function deleteHotel($id)
		{
			$this->db->delete('hotels', array('id' => $id));
		}

		public function updateHotel($id, $hotelData)
		{
			$this->db->where('id', $id);
			$this->db->update('hotels', $hotelData);
		}
		

	public function getHotelById($id)
	{
		$query = $this->db->get_where('hotels', array('id' => $id));
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return null;
		}
	}
	

	public function updateCountry($id, $newName)
	{
		$data = array('country' => $newName);
		$this->db->where('id', $id);
		$this->db->update('countries', $data);
	}
	
	public function updateCity($id, $newName)
    {
    $data = array(
        'city' => $newName
    );
    $this->db->where('id', $id);
    $this->db->update('cities', $data);
    }

		public function getHotelsByCountryId($countryId)
	{
		$this->db->where('countryid', $countryId);
		$query = $this->db->get('hotels');
		return $query->result_array();
	}

	public function getHotelsByCityId($cityId)
	{
		$this->db->where('cityid', $cityId);
		$query = $this->db->get('hotels');
		return $query->result_array();
	}

}
?>