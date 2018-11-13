<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

class JsonController extends ControllerBase {
	
	public function content() {
		$output = '{"json":"bien","ini":"pas bien"}';
		$response = new Response();
		$response->setContent($output);
		$response->headers->set('Content-Type', 'application/json');
		
		return $response;
	}
}