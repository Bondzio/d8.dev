<?php
/*
class HelloBlock extends BlockBase implements ContainerFactoryPluginInterface {

  protected $dateFormatter;
  protected $currentUser;
  protected $time;
  public function __construct(array $configuration,
                              $plugin_id,
                              $plugin_definition,
                              DateFormatter $dateFormatter,
                              AccountProxyInterface $currentUser,
                              TimeInterface $time) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->dateFormatter = $dateFormatter;
    $this->currentUser = $currentUser;
    $this->time = $time;
  }
*/
  /**
   * {@inheritdoc}.
   */
   /*
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('date.formatter'),
      $container->get('current_user'),
      $container->get('datetime.time')
    );
  }
  
  
  */
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
	  //kint(\Drupal::service('date.formatter')->format(time(),'long'));
		
	  $build = [
		'#markup' => $this->t('Welcome %time', [
			'%time' => \Drupal::service('date.formatter')->format(time(), 'custom', 'H:i s\s')
		]),
		'#cache' => [
			'keys' => ['cache_toto'],
			'max-age' => '3',
		],
	  ];
	  return $build;
  }
}
