<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class JsonController extends ControllerBase {
	
	public function content() {
		
		// Solution 1
		$output = '{"json":"bien","ini":"pas bien"}';
		$response = new Response();
		$response->setContent($output);
		$response->headers->set('Content-Type', 'application/json');
		
		// Solution 2
		$response = new JsonResponse([1,2,3]);
		
		return $response;
	}
}