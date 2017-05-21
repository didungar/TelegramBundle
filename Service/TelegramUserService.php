<?php
namespace DidUngar\TelegramBundle\Service;

use DidUngar\TelegramBundle\Entity\TelegramUser;

/*
class stdClass#754 (5) {
  public $id =>
  int(77523242)
  public $first_name =>
  string(12) "Didier Ungar"
  public $last_name =>
  string(18) "[IDF/Nice, France]"
  public $username =>
  string(8) "DidUngar"
  public $language_code =>
  string(2) "fr"
}
*/

class TelegramUserService {
	protected $container;
	public function __construct($service_container) {
		$this->container = $service_container;
	}
	public function import($stdUser) {
		$em = $this->container->get('doctrine.orm.entity_manager');
		$oUser = $em->getRepository('DidUngarTelegramBundle:TelegramUser')->findOneBy([
			'uid' => $stdUser->id,
		]);
		if ( empty($oUser) ) {
			$oUser = new TelegramUser();
			$oUser->setUid($stdUser->id);
			$em->persist($oUser);
		}
		if ( ! empty($stdUser->first_name) ) {
			$oUser->setFirstName($stdUser->first_name);
		}
		if ( ! empty($stdUser->last_name) ) {
			$oUser->setLastName($stdUser->last_name);
		}
		$oUser->setUserName($stdUser->username);
		$em->flush();
		return $oUser;
	}
}

