<?php

namespace Xi\Sms;

use Gateway\AbstractGateway;

class SmsService {
	private $container;

	private $gateway;

	public function __construct($container, AbstractGateway $gateway) {
		$this->container = $container;
		$this->gateway = $gateway;
	}

	public function send($body, $from, $to) {
		$message = new SmsMessage($body, $from, $to);
		$response = $this->gateway->send($message);

		// Save the message to the db
		$em = $this->get('doctrine')->getManager ();
		$em->persist($message);
		$em->flush();

		return $response;
	}
}