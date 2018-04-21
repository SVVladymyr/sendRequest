<?php

require_once 'includes/SendClass.php';

$data = array(
	'site_id' => '100',
	'type' => 'order',
	'data' => [
		['name'=>'Имя', 'value'=>'Маруся'],
		['name'=>'Дата заезда', 'value'=>'21.09.2017'],
		['name'=>'Дата выезда', 'value'=>'29.09.2017'],
		['name'=>'Телефон', 'value'=>'+79284444444'],
	]
);

$sendData = new SendClass($data);
$data = $sendData->reservationRequest();

unset($sendData);

var_dump($data);

