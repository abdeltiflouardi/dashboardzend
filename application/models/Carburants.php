<?php

class Application_Model_Carburants extends Application_Model_BaseModels
{

    private $carburantID;
    private $carburantName;

    public function getCarburantID()
    {
        return $this->carburantID;
    }

    public function setCarburantID($carburantID)
    {
        $this->carburantID = $carburantID;

        return $this;
    }

    public function getCarburantName()
    {
        return $this->carburantName;
    }

    public function setCarburantName($carburantName)
    {
        $this->carburantName = $carburantName;

        return $this;
    }

}

