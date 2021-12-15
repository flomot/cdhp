<?php
/**
 *
 * @author Buenck
 *
 */
class IdCode {

	public $ip;
	public $useragent;
	public $code;


	/**
	 */
	public function __construct() {

		$this->ip = $_SERVER['REMOTE_ADDR'];
		$this->useragent = $_SERVER['HTTP_USER_AGENT'];
		$this->code = null;
	}

	/**
	 * Getter der Eigenschaft $this->ip
	 * @return mixed
	 */
	public function getIp() {

		return $this->ip;
	}

	/**
	 * Setter der Eigenschaft $this->ip
	 * @param mixed $ip
	 */
	public function setIp($ip) {

		$this->ip = $ip;
	}

	/**
	 * Getter der Eigenschaft $this->useragent
	 * @return mixed
	 */
	public function getUseragent() {

		return $this->useragent;
	}

	/**
	 * Setter der Eigenschaft $this->useragent
	 * @param mixed $useragent
	 */
	public function setUseragent($useragent) {

		$this->useragent = $useragent;
	}
	/**
	 * Getter der Eigenschaft $this->code
	 * @return NULL
	 */
	public function getCode() {

		return md5("{$this->ip}{$this->useragent}");
	}
}

