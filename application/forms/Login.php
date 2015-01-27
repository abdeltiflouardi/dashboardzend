<?php

class Application_Form_Login extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('text', 'username', array(
            'filters' => array('StringTrim', 'StringToLower'),
            'required' => true,
            'validators' => array(
                'NotEmpty',
                'EmailAddress',
                array('StringLength', false, array(3, 100)),
            ),
            'label' => 'Email:'));

        $this->addElement('password', 'password', array(
            'filters' => array('StringTrim'),
            'required' => true,
            'validators' => array(
                'NotEmpty',
                'Alnum',
                array('StringLength', false, array(4, 20)),
            ),
            'label' => 'Password:'));

        $this->addElement('submit', 'login', array(
            'required' => false,
            'ignore'   => true,
            'label'    => 'Login'));

        parent::init();
    }

}

