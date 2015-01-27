<?php
/**
 * @author ouardisoft 
 */
class Common_Validate_IsCurrentPasswordValid extends Zend_Validate_Abstract
{

    const Password_IN_DB = 'PasswordInDB';

    protected $_messageTemplates = array(
        self::Password_IN_DB => "Password invalid"
    );

    public function isValid($value, $context = null)
    {
        $this->_setValue($value);
        $auth = Zend_Auth::getInstance()->getIdentity();

        $assureurMapper = new Application_Model_AssureursMapper();
        $assureur       = $assureurMapper->find($auth->AssureurID);

        if ($assureur->AssureurPassword != $value) {
            $this->_error(self::Password_IN_DB);
            return false;
        }

        return true;
    }

}

?>