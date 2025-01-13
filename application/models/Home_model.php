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
  	$query = $this->db->get('countries');
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
		$this->db->insert('countries', $data);
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
  
   public function getCountryById($id)
	{
		$query = $this->db->get_where('countries', array('id' => $id));
		return $query->result_array();
  }
  
  public function getCitiesById($id)
	{
		$query = $this->db->get_where('cities', array('countryid' => $id));
		return $query->result_array();
  }

}
?>