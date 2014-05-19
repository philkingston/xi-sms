<?php

namespace Xi\Sms;

use Gateway\AbstractGateway;

class SmsService {
	private $gateway;

	public function __construct(AbstractGateway $gateway) {
		$this->gateway = $gateway;
	}

	public function send($body, $from, $to) {
		$message = new SmsMessage($body, $from, $to);
		$this->gateway->send($message);
	}
}