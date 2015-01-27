<?php

class Application_Model_Assureurs extends Application_Model_BaseModels
{
    private $assureurID;
    private $assureurName;
    private $assureurDescription;
    private $assureurLogo;
    private $assureurTelephone;
    private $assureurFax;
    private $assureurAdresse;
    private $assureurVille;
    private $assureurCodePostal;
    private $assureurEmail;
    private $assureurPassword; 

    public function getAssureurID()
    {
        return $this->assureurID;
    }

    public function setAssureurID($assureurID)
    {
        $this->assureurID = $assureurID;
        
        return $this;
    }

    public function getAssureurName()
    {
        return $this->assureurName;
    }

    public function setAssureurName($assureurName)
    {
        $this->assureurName = $assureurName;
        
        return $this;
    }

    public function getAssureurDescription()
    {
        return $this->assureurDescription;
    }

    public function setAssureurDescription($assureurDescription)
    {
        $this->assureurDescription = $assureurDescription;
        
        return $this;
    }

    public function getAssureurLogo()
    {
        return $this->assureurLogo;
    }

    public function setAssureurLogo($assureurLogo)
    {
        $this->assureurLogo = $assureurLogo;
        
        return $this;
    }

    public function getAssureurTelephone()
    {
        return $this->assureurTelephone;
    }

    public function setAssureurTelephone($assureurTelephone)
    {
        $this->assureurTelephone = $assureurTelephone;
        
        return $this;
    }

    public function getAssureurFax()
    {
        return $this->assureurFax;
    }

    public function setAssureurFax($assureurFax)
    {
        $this->assureurFax = $assureurFax;
        
        return $this;
    }

    public function getAssureurAdresse()
    {
        return $this->assureurAdresse;
    }

    public function setAssureurAdresse($assureurAdresse)
    {
        $this->assureurAdresse = $assureurAdresse;
        
        return $this;
    }

    public function getAssureurVille()
    {
        return $this->assureurVille;
    }

    public function setAssureurVille($assureurVille)
    {
        $this->assureurVille = $assureurVille;
        
        return $this;
    }

    public function getAssureurCodePostal()
    {
        return $this->assureurCodePostal;
    }

    public function setAssureurCodePostal($assureurCodePostal)
    {
        $this->assureurCodePostal = $assureurCodePostal;
        
        return $this;
    }

    public function getAssureurEmail()
    {
        return $this->assureurEmail;
    }

    public function setAssureurEmail($assureurEmail)
    {
        $this->assureurEmail = $assureurEmail;
        
        return $this;
    }

    public function getAssureurPassword()
    {
        return $this->assureurPassword;
    }

    public function setAssureurPassword($assureurPassword)
    {
        $this->assureurPassword = $assureurPassword;
        
        return $this;
    }

}

