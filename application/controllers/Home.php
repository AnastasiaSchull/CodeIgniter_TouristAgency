<?php

class Home extends CI_Controller 
{
	public $exceptions;
	public $home_model;
	public function __construct()
  {
  	parent::__construct();
    $this->load->model('home_model');
  }

  public function index()
  {
  	$data['countries']=$this->home_model->getCountries();
  	$data['title']='Список стран:';
  	$this->load->view('countries',$data);
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
			$country=$this->home_model->getCountryById($id);
			$data['country']=$country;
			$data['city']=$cities;
			$data['title']='Страна: ';
			$this->load->view('city_info',$data);
		}
	}
}
?>
