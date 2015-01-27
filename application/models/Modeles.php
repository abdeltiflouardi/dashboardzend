<?php

class Application_Model_Modeles extends Application_Model_BaseModels
{

    private $modeleID;
    private $modeleName;
    private $marqueID;

    public function getModeleID()
    {
        return $this->modeleID;
    }

    public function setModeleID($modeleID)
    {
        $this->modeleID = $modeleID;
        return $this;
    }

    public function getModeleName()
    {
        return $this->modeleName;
    }

    public function setModeleName($modeleName)
    {
        $this->modeleName = $modeleName;
        return $this;
    }

    public function getMarqueID()
    {
        return $this->marqueID;
    }

    public function setMarqueID($marqueID)
    {
        $this->marqueID = $marqueID;
        return $this;
    }

}

