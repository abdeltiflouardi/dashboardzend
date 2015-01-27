<?php

class Application_Model_Puissances extends Application_Model_BaseModels
{

    private $puissanceID;
    private $carburantID;
    private $puissanceNbChevDe;
    private $puissanceNbChevA;

    public function getPuissanceID()
    {
        return $this->puissanceID;
    }

    public function setPuissanceID($puissanceID)
    {
        $this->puissanceID = $puissanceID;

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

    public function getPuissanceNbChevDe()
    {
        return $this->puissanceNbChevDe;
    }

    public function setPuissanceNbChevDe($puissanceNbChevDe)
    {
        $this->puissanceNbChevDe = $puissanceNbChevDe;

        return $this;
    }

    public function getPuissanceNbChevA()
    {
        return $this->puissanceNbChevA;
    }

    public function setPuissanceNbChevA($puissanceNbChevA)
    {
        $this->puissanceNbChevA = $puissanceNbChevA;

        return $this;
    }

}

