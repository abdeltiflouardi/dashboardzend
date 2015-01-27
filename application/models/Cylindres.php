<?php

class Application_Model_Cylindres extends Application_Model_BaseModels
{

    private $cylindreID;
    private $cylindreName;

    public function getCylindreID()
    {
        return $this->cylindreID;
    }

    public function setCylindreID($cylindreID)
    {
        $this->cylindreID = $cylindreID;

        return $this;
    }

    public function getCylindreName()
    {
        return $this->cylindreName;
    }

    public function setCylindreName($cylindreName)
    {
        $this->cylindreName = $cylindreName;

        return $this;
    }

}

