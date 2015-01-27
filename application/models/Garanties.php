<?php

class Application_Model_Garanties extends Application_Model_BaseModels
{

    private $garantieID;
    private $assuranceID;
    private $garantieName;
    private $garantieDescription;
    private $garantiePriority;

    public function getGarantieID()
    {
        return $this->garantieID;
    }

    public function setGarantieID($garantieID)
    {
        $this->garantieID = $garantieID;
        
        return $this;
    }

    public function getAssuranceID()
    {
        return $this->assuranceID;
    }

    public function setAssuranceID($assuranceID)
    {
        $this->assuranceID = $assuranceID;
        
        return $this;
    }

    public function getGarantieName()
    {
        return $this->garantieName;
    }

    public function setGarantieName($garantieName)
    {
        $this->garantieName = $garantieName;
        
        return $this;
    }

    public function getGarantieDescription()
    {
        return $this->garantieDescription;
    }

    public function setGarantieDescription($garantieDescription)
    {
        $this->garantieDescription = $garantieDescription;
        
        return $this;
    }    
    
    public function getGarantiePriority()
    {
        return $this->garantiePriority;
    }

    public function setGarantiePriority($garantiePriority)
    {
        $this->garantiePriority = $garantiePriority;
        
        return $this;
    }

}

