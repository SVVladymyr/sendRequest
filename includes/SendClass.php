<?php

class SendClass {

	private $apiKey = 'test198';
	private $url = "https://ko.tour-shop.ru/siteLead";
	private $data;

	public function __construct($data) {
		$this->data = $data;
	}

	public function reservationRequest() {

		$response = $this->sendRequest();

		return $this->jsonDecode($response);
	}

	/*
	 * Send request to server
	 */
	private function sendRequest() {
		$headers = array(
			'Content-Type:application/json',
			'KoSiteKey:'.$this->apiKey
		);

		$ch = curl_init($this->url);
		if (!$ch) {
			die("Couldn't initialize a cURL handle");
		}

		$data_string = $this->jsonEncode($this->data);

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_string );
		curl_setopt($ch, CURLOPT_HEADER,         1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);

		return ($httpcode>=200 && $httpcode<300) ? $response : false;
	}

	private function jsonDecode($response) {
		return json_decode($response);
	}

	private function jsonEncode($data) {
		return json_encode(data);
	}

}