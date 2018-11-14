<?php
namespace Drupal\hello\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class HelloForm extends FormBase{

    public function getFormID(){
        return 'hello_form_calculator';

    }
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        if (isset($form_state->getRebuildInfo()['result'])) {
             $form['result'] = array(
                '#type' => 'html_tag',
                '#tag' => 'h2',
                '#value' => $this->t('Result: ') . $form_state->getRebuildInfo()['result'],
        );
        }
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
    public function validateForm(array &$form, FormStateInterface $form_state) {

        $value_1 = $form_state->getValue('first_value');
        if(!is_numeric($value_1)){
            $form_state->setErrorByName('first_value',$this->t('Value 1 must be numeric'));
        }

    }
    /*public function validateTextAjax(array &$form, FormStateInterface $form_state){
        $css = ['border' => '2px solid green'];
        $message = 'Ajax message: ' . $form_state->getValue('text');

        $response = new AjaxResponse();
        $response->addCommand(new CssCommand('#edit-text',$css));
        $response->addCommand(new HtmlCommand('.text-message'))
    } */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        // TODO: Implement submitForm() method.
        $value_1 = $form_state->getValue('first_value');
        $operation = $form_state->getValue('operation');
        $value_2 = $form_state->getValue('second_value');
        $result = $value_1.$operation.$value_2;
        eval("\$result = $result;");

        $form_state->addRebuildInfo('result',$result);

        $form_state->setRebuild();
    }
}

