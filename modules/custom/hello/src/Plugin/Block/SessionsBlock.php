<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a session block.
 *
 *@Block(
 * id = "sessions_block",
 * admin_label = @Translation("Sessions!")
 * )
 */
class SessionsBlock extends BlockBase {

 /**
  * Implements Drupal\Core\Block\BlockBase::build().
  */
  public function build() {
	$result = \Drupal::database()
		  ->select('sessions', 's')
		  ->fields('s', array(
		  'uid',
		))
		  ->countQuery()
		  ->execute()
		  ->fetchField();
	

	$build = [
		'#markup' => $this->t('There is currently %number enable sessions', [
			'%number' => $result,
		]),
		'#cache' => [
			'keys' => ['cache_sessions_block'],
			'max-age' => '0',
		],
	  ];
	  return $build;
  }
}
