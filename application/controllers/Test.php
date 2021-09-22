<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
     
		$this->load->view('form');
	}

    function validate()
	{
		$captcha_response = trim($this->input->post('g-recaptcha-response'));

		if($captcha_response != '')
		{
			$keySecret = '6LeeWYQcAAAAAPviUltjmBo0vkCeySqnJiIt9Ebd';

			$check = array(
				'secret'		=>	$keySecret,
				'response'		=>	$this->security->xss_clean($this->input->post('g-recaptcha-response'))
			);

			$startProcess = curl_init();

			curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

			curl_setopt($startProcess, CURLOPT_POST, true);

			curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

			curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

			$receiveData = curl_exec($startProcess);

			$finalResponse = json_decode($receiveData, true);

			if($finalResponse['success'])
			{
				$storeData = array(
					'name'	=>	$this->security->xss_clean($this->input->post('name')),
					'email'	=>	$this->security->xss_clean($this->input->post('email')),
					'dob'	=>	$this->security->xss_clean($this->input->post('dob')),
					'about'	=>	$this->security->xss_clean($this->input->post('about'))
				);

				print_r($storeData);
			}
			else
			{
				echo "Please verify captcha";
			}
		}
		else
		{
			echo "Please verify captcha";
		}
	}

}

