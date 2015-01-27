<?php

class Application_Model_CarburantsMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Carburants');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array('' => '-----');
        foreach ($resultSet as $row) {
            $entries[$row->CarburantID] = $row->CarburantName;
        }
        return $entries;
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Carburants();
            $entry->setCarburantID($row->CarburantID)
                    ->setCarburantName($row->CarburantName);
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

    public function save(Application_Model_Carburants $carburant)
    {
        $data = array(
            'CarburantID' => $carburant->getCarburantID(),
            'CarburantName' => $carburant->getCarburantName(),
        );

        if ('' === ($id = $carburant->getCarburantID())) {
            $newID = $this->getDbTable()->insert($data);

            $carburant->setCarburantID($newID);
        } else {
            $this->getDbTable()->update($data, array('CarburantID = ?' => $carburant->getCarburantID()));
        }
    }

}
