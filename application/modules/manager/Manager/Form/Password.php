<?php

class Manager_Form_Password extends Application_Form_BaseForm
{

    public function init()
    {
        $this->addElement('password', 'currentPassword', array('validators' => array('IsCurrentPasswordValid'), 'required' => true, 'label'    => 'Mot de passe actuel:'));
        $this->addElement('password', 'newPassword', array('required' => true, 'label'    => 'Nouveau mot de passe:'));
        $this->addElement('password', 'confirmPassword', array('validators' => array('PasswordConfirmation'), 'required' => true, 'label' => 'Confirmation:'));

        $this->addElement('submit', 'save');

        parent::init();
    }

}