<?php

class Application_Model_PackagesGaranties extends Application_Model_BaseModels
{
    private $packageID;
    private $garantieID;
    private $tauxReduction;
    private $tauxMajoration;
    
    public function getPackageID()
    {
        return $this->packageID;
    }

    public function setPackageID($packageID)
    {
        $this->packageID = $packageID;
        
        return $this;
    }

    public function getGarantieID()
    {
        return $this->garantieID;
    }

    public function setGarantieID($garantieID)
    {
        $this->garantieID = $garantieID;
        
        return $this;
    }

    public function getTauxReduction()
    {
        return $this->tauxReduction;
    }

    public function setTauxReduction($tauxReduction)
    {
        $this->tauxReduction = $tauxReduction;
        
        return $this;
    }

    public function getTauxMajoration()
    {
        return $this->tauxMajoration;
    }

    public function setTauxMajoration($tauxMajoration)
    {
        $this->tauxMajoration = $tauxMajoration;
        
        return $this;
    }    

}

