<?php

class Application_Model_VehiculesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Vehicules');
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Vehicules();
            $entry->setVehiculeID($row->VehiculeID)
                    ->setVehiculeImmatricule($row->VehiculeImmatricule);
            $entries[] = $entry;
        }
        return $entries;
    }

    public function find($id)
    {
        return $this->getDbTable()->find($id)->current();
    }

    public function getDataFormById($id)
    {
        $array = $this->find($id)->toArray();
        $array_values = array_values($array);
        $array_keys = array_map('lcfirst', array_keys($array));

        return array_combine($array_keys, $array_values);
    }

    public function save(Application_Model_Vehicules $vehicule)
    {
        $data = array(
            'VehiculeID' => $vehicule->getVehiculeID(),
            'VehiculeImmatricule' => $vehicule->getVehiculeImmatricule(),
            'MarqueID' => $vehicule->getMarqueID(),
            'ModeleID' => $vehicule->getModeleID(),
            'PuissanceID' => $vehicule->getPuissanceID(),
            'CarburantID' => $vehicule->getCarburantID(),
            'VehiculeValeurNeuf' => $vehicule->getVehiculeValeurNeuf(),
            'VehiculeValeurVenal' => $vehicule->getVehiculeValeurVenal(),
            'VehiculeValeurGlaces' => $vehicule->getVehiculeValeurGlaces(),
            'VehiculeDateAchat' => $vehicule->getVehiculeDateAchat(),
            'DateMiseCirculation' => $vehicule->getDateMiseCirculation(),
            'VehiculeSurCredit' => $vehicule->getVehiculeSurCredit(),
            'VehiculeMontantCredit' => $vehicule->getVehiculeMontantCredit(),
            'VehiculeDateFinCredit' => $vehicule->getVehiculeDateFinCredit(),
        );

        if ('' === ($id = $vehicule->getVehiculeID())) {
            $newID = $this->getDbTable()->insert($data);

            $vehicule->setVehiculeID($newID);
        } else {
            $this->getDbTable()->update($data, array('VehiculeID = ?' => $vehicule->getVehiculeID()));
        }
    }

}

