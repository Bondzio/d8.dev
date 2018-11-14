<?php
namespace Drupal\hello\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class HelloForm extends FormBase{

    public function getFormID(){

    }
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        // TODO: Implement buildForm() method.
        $form['first_value'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('First value'),
            '#description' => $this->t('Enter first value'),
            '#required' => TRUE,
        );

        $form['operation'] = array(
            '#type' => 'radios',
            '#options' => array(
                '+' => 'Add',
                '-' => 'Subtract',
                '*' => 'Multiply',
                '/' => 'Divide',
            ),
        );
        $form['second_value'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Second value'),
            '#description' => $this->t('Enter second value'),
            '#required' => TRUE,
        );
        $form['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Calculate'),
        );
            return $form;
    }
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // TODO: Implement submitForm() method.
    }
}

