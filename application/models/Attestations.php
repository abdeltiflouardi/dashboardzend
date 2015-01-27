<?php

class Application_Model_Attestations extends Application_Model_BaseModels
{

    private $attestationID;

    public function getAttestationID()
    {
        return $this->attestationID;
    }

    public function setAttestationID($attestationID)
    {
        $this->attestationID = $attestationID;

        return $this;
    }

}

