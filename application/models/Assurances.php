<?php

class Application_Model_Assurances extends Application_Model_BaseModels
{
    private $assuranceID;
    private $assuranceName;
    
    public function getAssuranceID()
    {
        return $this->assuranceID;
    }

    public function setAssuranceID($assuranceID)
    {
        $this->assuranceID = $assuranceID;
        
        return $this;
    }

    public function getAssuranceName()
    {
        return $this->assuranceName;
    }

    public function setAssuranceName($assuranceName)
    {
        $this->assuranceName = $assuranceName;
        
        return $this;
    }

    
}

