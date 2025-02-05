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
		//$this->db->select('hotels.*, images.imagepath');
		$this->db->select('hotels.*, images.imagepath, cities.city as city_name, GROUP_CONCAT(CONCAT(users.login, " (", comments.posted, "): ", comments.comment) SEPARATOR "<br>") as reviews');
		$this->db->from('hotels');
		$this->db->join('images', 'images.hotelid = hotels.id', 'left'); // присоединяем таблицу images
		$this->db->where('images.imagepath LIKE', 'uploads%'); // условие для фильтрации
		$this->db->join('cities', 'cities.id = hotels.cityid', 'left'); // присоединяем таблицу cities
		$this->db->join('comments', 'comments.hotel_id = hotels.id', 'left');
        $this->db->join('users', 'users.id = comments.user_id', 'left');
		$this->db->group_by('hotels.id'); // группируем по id отеля, чтобы получить только одну запись
		$query = $this->db->get();
		return $query->result_array(); // возвращаем массив данных
	}
	

	public function insertImage($data)
	{
		$this->db->insert('images', $data);
	}
	
	public function insertHotel($data)
	{
		$this->db->insert('hotels', $data);
		return $this->db->insert_id(); // возвращает ID последней вставленной записи
	}
	

	public function deleteHotel($id)
	{
		// удаляем связанные комментарии
		$this->db->delete('comments', array('hotel_id' => $id));
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
		$this->db->select('hotels.*, images.imagepath');
		$this->db->from('hotels');
		$this->db->join('images', 'images.hotelid = hotels.id', 'left'); // присоединяем табл images
		$this->db->where('hotels.cityid', $cityId);
		$this->db->where('images.imagepath LIKE', 'uploads%'); // добавляем условие для фильтрации imagepath
		$this->db->group_by('hotels.id'); // один отель - одна строка
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insertComment($data)
	{
		$this->db->insert('comments', $data);		
	}

}
?>