<?php

class Application_Model_Vehicules extends Application_Model_BaseModels
{
    private $vehiculeID;
    private $vehiculeImmatricule;
    private $marqueID;
    private $modeleID;
    private $puissanceID;
    private $carburantID;
    private $vehiculeValeurNeuf;
    private $vehiculeValeurVenal;
    private $vehiculeValeurGlaces;
    private $vehiculeDateAchat;
    private $dateMiseCirculation;
    private $vehiculeSurCredit;	
    private $vehiculeMontantCredit;
    private $vehiculeDateFinCredit;
    
    public function getVehiculeID()
    {
        return $this->vehiculeID;
    }

    public function setVehiculeID($vehiculeID)
    {
        $this->vehiculeID = $vehiculeID;
        
        return $this;
    }

    public function getVehiculeImmatricule()
    {
        return $this->vehiculeImmatricule;
    }

    public function setVehiculeImmatricule($vehiculeImmatricule)
    {
        $this->vehiculeImmatricule = $vehiculeImmatricule;
        
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

    public function getModeleID()
    {
        return $this->modeleID;
    }

    public function setModeleID($modeleID)
    {
        $this->modeleID = $modeleID;
        
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

    public function getCarburantID()
    {
        return $this->carburantID;
    }

    public function setCarburantID($carburantID)
    {
        $this->carburantID = $carburantID;
        
        return $this;
    }

    public function getVehiculeValeurNeuf()
    {
        return $this->vehiculeValeurNeuf;
    }

    public function setVehiculeValeurNeuf($vehiculeValeurNeuf)
    {
        $this->vehiculeValeurNeuf = $vehiculeValeurNeuf;
        
        return $this;
    }

    public function getVehiculeValeurVenal()
    {
        return $this->vehiculeValeurVenal;
    }

    public function setVehiculeValeurVenal($vehiculeValeurVenal)
    {
        $this->vehiculeValeurVenal = $vehiculeValeurVenal;
        
        return $this;
    }

    public function getVehiculeValeurGlaces()
    {
        return $this->vehiculeValeurGlaces;
    }

    public function setVehiculeValeurGlaces($vehiculeValeurGlaces)
    {
        $this->vehiculeValeurGlaces = $vehiculeValeurGlaces;
        
        return $this;
    }

    public function getVehiculeDateAchat()
    {
        return $this->vehiculeDateAchat;
    }

    public function setVehiculeDateAchat($vehiculeDateAchat)
    {
        $this->vehiculeDateAchat = $vehiculeDateAchat;
        
        return $this;
    }

    public function getDateMiseCirculation()
    {
        return $this->dateMiseCirculation;
    }

    public function setDateMiseCirculation($dateMiseCirculation)
    {
        $this->dateMiseCirculation = $dateMiseCirculation;
        
        return $this;
    }

    public function getVehiculeSurCredit()
    {
        return $this->vehiculeSurCredit;
    }

    public function setVehiculeSurCredit($vehiculeSurCredit)
    {
        $this->vehiculeSurCredit = $vehiculeSurCredit;
        
        return $this;
    }

    public function getVehiculeMontantCredit()
    {
        return $this->vehiculeMontantCredit;
    }

    public function setVehiculeMontantCredit($vehiculeMontantCredit)
    {
        $this->vehiculeMontantCredit = $vehiculeMontantCredit;
        
        return $this;
    }

    public function getVehiculeDateFinCredit()
    {
        return $this->vehiculeDateFinCredit;
    }

    public function setVehiculeDateFinCredit($vehiculeDateFinCredit)
    {
        $this->vehiculeDateFinCredit = $vehiculeDateFinCredit;
        
        return $this;
    }
    
}

