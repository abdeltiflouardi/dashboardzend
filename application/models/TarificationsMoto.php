<?php

class Application_Model_TarificationsMoto extends Application_Model_BaseModels
{

    private $tarificationID;
    private $garantieID;
    private $cylindreID;
    private $nbRoue;
    private $prime;

    public function getTarificationID()
    {
        return $this->tarificationID;
    }

    public function setTarificationID($tarificationID)
    {
        $this->tarificationID = $tarificationID;
        
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

    public function getCylindreID()
    {
        return $this->cylindreID;
    }

    public function setCylindreID($cylindreID)
    {
        $this->cylindreID = $cylindreID;
        
        return $this;
    }

    public function getNbRoue()
    {
        return $this->nbRoue;
    }

    public function setNbRoue($nbRoue)
    {
        $this->nbRoue = $nbRoue;
        
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

}

