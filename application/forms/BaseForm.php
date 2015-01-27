<?php

class Application_Form_BaseForm extends Zend_Form
{

    protected $_defaultDecorator = array(
        'FormElements',
        array('Description', array('placement'     => 'prepend')),
        'Form'
    );
    protected $_textDecorator = array(
        'ViewHelper',
        'Errors',
        array('Label', array('requiredSuffix' => ' <span class="required">*</span>', 'escape'         => false)),
        array('HtmlTag', array('tag'             => 'div', 'class'           => 'input text')),
    );
    protected $_selectDecorator = array(
        'ViewHelper',
        'Errors',
        array('Label', array('requiredSuffix' => ' <span class="required">*</span>', 'escape'         => false)),
        array('HtmlTag', array('tag'               => 'div', 'class'             => 'input select')),
    );
    protected $_textareaDecorator = array(
        'ViewHelper',
        'Errors',
        array('Label', array('requiredSuffix' => ' <span class="required">*</span>', 'escape'         => false)),
        array('HtmlTag', array('tag'             => 'div', 'class'           => 'input textarea')),
    );
    protected $_checkboxDecorator = array(
        'ViewHelper',
        'Errors',
        array('Label', array('requiredSuffix' => ' <span class="required">*</span>', 'escape'         => false)),
        array('HtmlTag', array('tag'             => 'div', 'class'           => 'input checkbox')),
    );
    protected $_multiCheckboxDecorator = array(
        'ViewHelper',
        'Errors',
        array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'list-checkbox')),
        array('Label', array('requiredSuffix' => ' <span class="required">*</span>', 'class' => 'label', 'escape'         => false, 'placement' => 'prepend')),
        array('HtmlTag', array('tag'             => 'div', 'class'           => 'input multi-checkbox')),

    );
    protected $_submitDecorator = array(
        array('ViewHelper'),
        array('HtmlTag', array('tag'   => 'div', 'class' => 'submit')),
    );

    protected $_fileDecorator = array(
        'File',
        array(array('Value'=>'HtmlTag'), array('tag'=>'span','class'=>'value')),
        'Errors',
        'Description',
        'Label',
        array(array('Field'=>'HtmlTag'), array('tag'=>'div','class'=>'input file')),        
    );

    public function init()
    {
        $this->addElementPrefixPath('Common_Validate', 'Common/Validate/', Zend_Form_Element::VALIDATE);

        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));

        $this->clearDecorators();
        $this->setDecorators($this->_defaultDecorator);
        $this->setElementDecorators($this->_textDecorator);

        foreach ($this->getElements() as $element)
            switch ($element->getType()) {
                case 'Zend_Form_Element_Select':
                    $element->setDecorators($this->_selectDecorator);
                    ;break;
                case 'Zend_Form_Element_Text':
                case 'Zend_Form_Element_Password':
                    $element->setDecorators($this->_textDecorator);
                    ;break;
                case 'Zend_Form_Element_Submit':
                    $element->setDecorators($this->_submitDecorator);
                    ;break; 
                case 'Zend_Form_Element_Checkbox':
                    $element->setDecorators($this->_checkboxDecorator);
                    ;break; 
                case 'Zend_Form_Element_MultiCheckbox':
                    $element->setDecorators($this->_multiCheckboxDecorator);
                    ;break;
                case 'Zend_Form_Element_Textarea':
                    $element->setDecorators($this->_textareaDecorator);
                    ;break;
                case 'Zend_Form_Element_Hidden':
                case 'Zend_Form_Element_Hash':
                    $element->removeDecorator('HtmlTag');
                    $element->removeDecorator('Label');
                    ;break; 
                case 'Zend_Form_Element_File':
                    $element->setDecorators($this->_fileDecorator);
                    ;break;                
            }
    }

}