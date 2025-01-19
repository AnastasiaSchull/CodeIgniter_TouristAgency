<?php

class Home extends CI_Controller 
{ 
    public $form_validation;   
    public $session;
	public $exceptions;
	public $home_model;
	public function __construct()
  {
  	parent::__construct();
    $this->load->model('home_model');  
    $this->load->library('form_validation');
  }

public function index()
{
    if (!$this->session->userdata('user')) {
        $data['message'] = "Добро пожаловать в турагентство! Войдите или зарегистрируйтесь.";
        $this->load->view('welcome_view', $data);
    } else {
        $data['countries'] = $this->home_model->getCountries();
        $data['title'] = 'Список стран:';
        $this->load->view('countries', $data);
    }
}

  public function createCountry()
  {      
		$send=$this->input->post('send');
		if(!$send)
			$this->load->view('create_form_country');
		else
		{
			$country=$this->input->post('country');
			$this->home_model->createCountry($country);
			$this->index();
		}
  }
  
  public function deleteCountry()
  {
		$send=$this->input->post('send');
		if(!$send)
		{
			$data['list']=$this->home_model->getCountries() ;
			$this->load->view('delete_form_country', $data);
		}
		else
		{
			$id=$this->input->post('countryid');
			$this->home_model->deleteCountry($id);
			$this->index();
		}
  }
  
  public function createCity()
  {
		$send=$this->input->post('send');
		if(!$send)
		{
			$data['countries']=$this->home_model->getCountries();
			$this->load->view('create_form_city', $data);
		}
		else
		{
			$countryid=$this->input->post('countryid');
			$city=$this->input->post('city');
			$this->home_model->createCity($countryid,$city);
			$this->index();
		}
  }
  
  public function deleteCity()
  {
		$send=$this->input->post('send');
		if(!$send)
		{
			$data['list']=$this->home_model->getCity() ;
			$this->load->view('delete_form_city', $data);
		}
		else
		{
			$id=$this->input->post('cityid');
			$this->home_model->deleteCity($id);
			$this->index();
		}
  }

  function getCityByCountry()
	{
		if (!$this->input->post('send'))
		{
			$data['list']=$this->home_model->getCountries() ;
			$this->load->view('form_country_id',$data);
		}
		else
		{
			$id=$this->input->post('countryid');
			$cities=$this->home_model->getCitiesById($id);
			//$country=$this->home_model->getCountryById($id);
            $country = $this->home_model->getCountryById($id, false); // возвращает массив строк
			$data['country']=$country;
			$data['city']=$cities;
			$data['title']='Страна: ';
			$this->load->view('city_info',$data);
		}
	}

    public function createHotel()
{
    $send = $this->input->post('send');
    if (!$send) {
        $data['countries'] = $this->home_model->getCountries();
        $data['cities'] = $this->home_model->getCity();
        $this->load->view('create_form_hotel', $data);
    } else {
        $hotelData = array(
            'hotel' => $this->input->post('hotel'),
            'cityid' => $this->input->post('cityid'),
            'countryid' => $this->input->post('countryid'),
            'stars' => $this->input->post('stars'),
            'cost' => $this->input->post('cost'),
            'info' => $this->input->post('info')
        );
        $this->home_model->createHotel($hotelData);
        redirect('home/index');
    }
}

public function deleteHotel()
{
    $send = $this->input->post('send');
    if (!$send) {
        $data['hotels'] = $this->home_model->getHotels();
        $this->load->view('delete_form_hotel', $data);
    } else {
        $id = $this->input->post('hotelid');
        $this->home_model->deleteHotel($id);
        redirect('home/index');
    }
}

public function getHotels()
{
    $data['hotels'] = $this->home_model->getHotels();
    $this->load->view('hotels_list', $data);
}

public function editCountry()
{
    $data['countries'] = $this->home_model->getCountries();
    $this->load->view('edit_country', $data);
}

public function editCity()
{
    $data['cities'] = $this->home_model->getCity();
    $this->load->view('edit_city', $data);
}

public function editHotel()
{
    $data['hotels'] = $this->home_model->getHotels();
    $this->load->view('edit_hotel', $data);
}

public function updateCountry()
{
    $id = $this->input->post('countryid');
    $newName = $this->input->post('countryName');
    $this->home_model->updateCountry($id, $newName);
    redirect('home/index');
}

public function updateCity()
{
    $id = $this->input->post('cityid');
    $newName = $this->input->post('cityName');
    $this->home_model->updateCity($id, $newName);
    redirect('home/index');
}

public function updateHotel()
{
    $id = $this->input->post('hotelid');
    $hotelData = [
        'hotel' => $this->input->post('hotelName'),
        'stars' => $this->input->post('stars'),
        'cost' => $this->input->post('cost'),
        'info' => $this->input->post('info')
    ];
    
    $this->home_model->updateHotel($id, $hotelData);
    redirect('home/index');
}


public function edit()
{
    $this->load->view('edit_view');
}

public function getHotelData()
{
    $hotelId = $this->input->post('hotelid');
    $hotelData = $this->home_model->getHotelById($hotelId);

    header('Content-Type: application/json'); // заголовок JSON
    echo json_encode($hotelData);
    exit;
}

public function getHotelsByCountry()
{
    if (!$this->input->post('send')) {
        $data['countries'] = $this->home_model->getCountries();
        $this->load->view('form_country_hotel', $data);
    } else {       
        $countryId = $this->input->post('countryid'); // id выбранной страны      
        $data['country'] = $this->home_model->getCountryById($countryId, true); // возвращает 1 строку

       $data['cities'] = $this->home_model->getCitiesById($countryId);
        $data['hotels'] = $this->home_model->getHotelsByCountryId($countryId); // отели конкретной страны
       
        if (empty($data['country'])) {
            show_error('Страна не найдена', 404);
        }
       // var_dump($data);//для отладки
        $this->load->view('cities_with_hotels', $data); 
    }
}

public function getHotelsByCity()
{
    $cityId = $this->input->post('cityid'); // id города из POST-запроса

    if (empty($cityId)) {
        show_error('Город не выбран', 400);
    }
    $data['hotels'] = $this->home_model->getHotelsByCityId($cityId);
    $data['city'] = $this->home_model->getCityById($cityId);
    $this->load->view('hotels_in_city', $data);
}

}
?>
