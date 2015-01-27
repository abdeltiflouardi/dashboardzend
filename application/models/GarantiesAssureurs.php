<?php

class Application_Model_GarantiesAssureurs extends Application_Model_BaseModels
{
    private $garantieID;
    private $assureurID;
    private $assuranceID;

    public function getGarantieID()
    {
        return $this->garantieID;
    }

    public function setGarantieID($garantieID)
    {
        $this->garantieID = $garantieID;
        
        return $this;
    }

    public function getAssureurID()
    {
        return $this->assureurID;
    }

    public function setAssureurID($assureurID)
    {
        $this->assureurID = $assureurID;

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
}

