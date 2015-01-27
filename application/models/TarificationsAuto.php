<?php

class Application_Model_TarificationsAuto extends Application_Model_BaseModels
{

    private $tarificationID;
    private $usageID;
    private $garantieID;
    private $carburantID;
    private $puissanceID;
    private $prime;
    private $franchise;
    private $valeurDeclaree;

    public function getTarificationID()
    {
        return $this->tarificationID;
    }

    public function setTarificationID($tarificationID)
    {
        $this->tarificationID = $tarificationID;
        
        return $this;
    }

    public function getUsageID()
    {
        return $this->usageID;
    }

    public function setUsageID($usageID)
    {
        $this->usageID = $usageID;
        
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

    public function getCarburantID()
    {
        return $this->carburantID;
    }

    public function setCarburantID($carburantID)
    {
        $this->carburantID = $carburantID;
        
        return $this;
    }

    public function getPuissanceID()
    {
        return $this->puissanceID;
    }

    public function setPuissanceID($puissanceID)
    {
        $this->puissanceID = $puissanceID;
        
        return $this;
    }

    public function getPrime()
    {
        return $this->prime;
    }

    public function setPrime($prime)
    {
        $this->prime = $prime;
        
        return $this;
    }

    public function getFranchise()
    {
        return $this->franchise;
    }

    public function setFranchise($franchise)
    {
        $this->franchise = $franchise;
        
        return $this;
    }

    public function getValeurDeclaree()
    {
        return $this->valeurDeclaree;
    }

    public function setValeurDeclaree($valeurDeclaree)
    {
        $this->valeurDeclaree = $valeurDeclaree;
        
        return $this;
    }

}

