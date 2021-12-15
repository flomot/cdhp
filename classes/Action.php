<?php
/**
 *
 * @author Buenck
 *
 */
class Action {

	public $id;
	public $time;
	public $status;
	public $canonical;
	public $type;
	public $context;

	public $content;


	/**
	 */
	public function __construct() {

		$this->id = rand();
		$this->time = $_SERVER['REQUEST_TIME'];
	}

}

