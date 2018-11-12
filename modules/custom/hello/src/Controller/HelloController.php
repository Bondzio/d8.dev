<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase {
	
	public function content($param) {
		
		if(isset($param) AND $param != 'nada'){
			$AccountName = $param;
		}else{
			$AccountName = $this->currentUser()->getAccountName();
		}
		$markup = t('Welcome on Hello page. Your Account name is %name',[ '%name'=> $AccountName]);
		
		return ['#markup' => $markup];
	}
}