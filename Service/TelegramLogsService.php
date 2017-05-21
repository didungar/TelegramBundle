<?php
namespace DidUngar\TelegramBundle\Service;

class TelegramLogsService {
	protected $container;
	public function __construct($service_container) {
		$this->container = $service_container;
	}
	
	public function select(array $aArgs = []) {
		$em = $this->container->get('doctrine')->getManager();
        	$repLog = $em->getRepository('DidUngarTelegramBundle:Logs');
        	return $repLog->findBy([]);
	}
}


