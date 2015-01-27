<?php

class Application_Model_CylindresMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Cylindres');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array('' => '-----');
        foreach ($resultSet as $row) {
            $entries[$row->CylindreID] = $row->CylindreName;
        }
        return $entries;
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Cylindres();
            $entry->setCylindreID($row->CylindreID)
                    ->setCylindreName($row->CylindreName);
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

    public function save(Application_Model_Cylindres $cylindre)
    {
        $data = array(
            'CylindreID' => $cylindre->getCylindreID(),
            'CylindreName' => $cylindre->getCylindreName(),
        );

        if ('' === ($id = $cylindre->getCylindreID())) {
            $newID = $this->getDbTable()->insert($data);

            $cylindre->setCylindreID($newID);
        } else {
            $this->getDbTable()->update($data, array('CylindreID = ?' => $cylindre->getCylindreID()));
        }
    }

}

