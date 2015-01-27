<?php

class Application_Model_Marques extends Application_Model_BaseModels
{

    private $marqueID;
    private $marqueName;

    public function getMarqueID()
    {
        return $this->marqueID;
    }

    public function setMarqueID($marqueID)
    {
        $this->marqueID = $marqueID;
        return $this;
    }

    public function getMarqueName()
    {
        return $this->marqueName;
    }

    public function setMarqueName($marqueName)
    {
        $this->marqueName = $marqueName;
        return $this;
    }

}

