<?php

class Application_Model_MarquesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Marques');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array('' => '-----');
        foreach ($resultSet as $row) {
            $entries[$row->MarqueID] = $row->MarqueName;
        }
        return $entries;        
    }
    
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Marques();
            $entry->setMarqueID($row->MarqueID)
                    ->setMarqueName($row->MarqueName);
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

    public function save(Application_Model_Marques $marque)
    {
        $data = array(
            'MarqueID' => $marque->getMarqueID(),
            'MarqueName' => $marque->getMarqueName(),
        );

        if ('' === ($id = $marque->getMarqueID())) {
            $newID = $this->getDbTable()->insert($data);

            $marque->setMarqueID($newID);
        } else {
            $this->getDbTable()->update($data, array('MarqueID = ?' => $marque->getMarqueID()));
        }
    }

}