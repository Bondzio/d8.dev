<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a hello block.
 *
 *@Block(
 * id = "hello_block",
 * admin_label = @Translation("Hello!")
 * )
 */
class Hello extends BlockBase {

 /**
  * Implements Drupal\Core\Block\BlockBase::build().
  */
  public function build() {
	  kint(\Drupal::service('date.formatter')->format(time(),'long'));
		
	  $build = [
		'#markup' => $this->t('Welcome %time', [
			'%time' => \Drupal::service('datetime.time')->getCurrentTime()
		]),
	  ];
	  return $build;
  }
}
