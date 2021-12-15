<?php
/**
 *
 * @author Buenck
 *
 */
class Visit {

	public $id;
	public $startTime;
	public $runTime;
	public $sessionId;
	public $idCode;
	public $useragent;
	public $countAction;
	public $isIntern;
	public $isSearchengine;
	public $isMalicious;

	public $contexts;
	public $currentAction;

	public $login;

	public $actions;

	/**
	 */
	public function __construct() {

		if(!$this->fromSession()) {
			$this->idCode = (new IdCode())->getCode();
			$this->sessionId = session_id();
			$this->startTime = $_SERVER['REQUEST_TIME'];
			$this->useragent = new Useragent();
			$this->actions = [];
			$this->login = null;
		}
	}

	/**
	 *
	 */
	public function __destruct() {

		$this->toSession();
	}

	/**
	 *
	 */
	public function __clone() {

	}

	/**
	 *
	 */
	public function fromSession() {

		if(session_status()
				&& !empty($_SESSION['visit'])
		) {
			$tmp = unserialize($_SESSION['visit']);
			$this->setIdCode($tmp->getIdCode());
			$this->setSessionId($tmp->getSessionId());
			$this->setStartTime($tmp->getStartTime());
			$this->setUseragent($tmp->getUseragent());
			$this->setActions($tmp->getActions());
			$this->setCountAction($tmp->getCountAction());
			$this->setLogin($tmp->getLogin());
			return true;
		}

		return false;
	}

	/**
	 *
	 */
	public function toSession() {

		if(session_status()) {
			$_SESSION['visit'] = serialize($this);
		}
	}

	/**
	 *
	 */
	public function newAction() {

		$this->setCountAction($this->getCountAction() + 1);
		$this->setCurrentAction(new Action());
		$this->setActions(array_push($this->getActions(), $this->getCurrentAction()));
		$this->setRunTime(time() - $this->getStartTime());
	}

	// Getter & Setter
	/**
	 * Getter der Eigenschaft $this->id
	 * @return number
	 */
	public function getId() {

		return $this->id;
	}

	/**
	 * Setter der Eigenschaft $this->id
	 * @param number $id
	 */
	public function setId($id) {

		$this->id = $id;
	}

	/**
	 * Getter der Eigenschaft $this->startTime
	 * @return number
	 */
	public function getStartTime() {

		return $this->startTime;
	}

	/**
	 * Setter der Eigenschaft $this->startTime
	 * @param number $startTime
	 */
	public function setStartTime($startTime) {

		$this->startTime = $startTime;
	}

	/**
	 * Getter der Eigenschaft $this->runTime
	 * @return number
	 */
	public function getRunTime() {

		return $this->runTime;
	}

	/**
	 * Setter der Eigenschaft $this->runTime
	 * @param number $runTime
	 */
	public function setRunTime($runTime) {

		$this->runTime = $runTime;
	}

	/**
	 * Getter der Eigenschaft $this->sessionId
	 * @return string
	 */
	public function getSessionId() {

		return $this->sessionId;
	}

	/**
	 * Setter der Eigenschaft $this->sessionId
	 * @param string $sessionId
	 */
	public function setSessionId($sessionId) {

		$this->sessionId = $sessionId;
	}

	/**
	 * Getter der Eigenschaft $this->idCode
	 * @return IdCode
	 */
	public function getIdCode() {

		return $this->idCode;
	}

	/**
	 * Setter der Eigenschaft $this->idCode
	 * @param IdCode $idCode
	 */
	public function setIdCode($idCode) {

		$this->idCode = $idCode;
	}

	/**
	 * Getter der Eigenschaft $this->useragent
	 * @return Useragent
	 */
	public function getUseragent() {

		return $this->useragent;
	}

	/**
	 * Setter der Eigenschaft $this->useragent
	 * @param Useragent $useragent
	 */
	public function setUseragent($useragent) {

		$this->useragent = $useragent;
	}

	/**
	 * Getter der Eigenschaft $this->countAction
	 * @return number
	 */
	public function getCountAction() {

		return $this->countAction;
	}

	/**
	 * Setter der Eigenschaft $this->countAction
	 * @param number $countAction
	 */
	public function setCountAction($countAction) {

		$this->countAction = $countAction;
	}

	/**
	 * Getter der Eigenschaft $this->isIntern
	 * @return boolean
	 */
	public function getIsIntern() {

		return $this->isIntern;
	}

	/**
	 * Setter der Eigenschaft $this->isIntern
	 * @param boolean $isIntern
	 */
	public function setIsIntern($isIntern) {

		$this->isIntern = $isIntern;
	}

	/**
	 * Getter der Eigenschaft $this->isSearchengine
	 * @return boolean
	 */
	public function getIsSearchengine() {

		return $this->isSearchengine;
	}

	/**
	 * Setter der Eigenschaft $this->isSearchengine
	 * @param boolean $isSearchengine
	 */
	public function setIsSearchengine($isSearchengine) {

		$this->isSearchengine = $isSearchengine;
	}

	/**
	 * Getter der Eigenschaft $this->isMalicious
	 * @return boolean
	 */
	public function getIsMalicious() {

		return $this->isMalicious;
	}

	/**
	 * Setter der Eigenschaft $this->isMalicious
	 * @param boolean $isMalicious
	 */
	public function setIsMalicious($isMalicious) {

		$this->isMalicious = $isMalicious;
	}

	/**
	 * Getter der Eigenschaft $this->contexts
	 * @return mixed
	 */
	public function getContexts() {

		return $this->contexts;
	}

	/**
	 * Setter der Eigenschaft $this->contexts
	 * @param mixed $contexts
	 */
	public function setContexts($contexts) {

		$this->contexts = $contexts;
	}

	/**
	 * Getter der Eigenschaft $this->currentAction
	 * @return Action
	 */
	public function getCurrentAction() {

		return $this->currentAction;
	}

	/**
	 * Setter der Eigenschaft $this->currentAction
	 * @param Action $currentAction
	 */
	public function setCurrentAction($currentAction) {

		$this->currentAction = $currentAction;
	}

	/**
	 * Getter der Eigenschaft $this->login
	 * @return /Login
	 */
	public function getLogin() {

		return $this->login;
	}

	/**
	 * Setter der Eigenschaft $this->login
	 * @param /Login $login
	 */
	public function setLogin($login) {

		$this->login = $login;
	}

	/**
	 * Getter der Eigenschaft $this->actions
	 * @return array<Action>
	 */
	public function getActions() {

		if(!is_array($this->actions)) {
			$this->actions = [];
		}
		return $this->actions;
	}

	/**
	 * Setter der Eigenschaft $this->actions
	 * @param array<Action> $actions
	 */
	public function setActions($actions) {

		$this->actions = $actions;
	}
}

