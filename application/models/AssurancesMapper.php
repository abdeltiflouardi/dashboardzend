<?php

class Application_Model_AssurancesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Assurances');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array('' => '-----');
        foreach ($resultSet as $row) {
            $entries[$row->AssuranceID] = $row->AssuranceName;
        }
        return $entries;
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry     = new Application_Model_Assurances();
            $entry->setAssuranceID($row->AssuranceID)
                    ->setAssuranceName($row->AssuranceName);
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
        $array        = $this->find($id)->toArray();
        $array_values = array_values($array);
        $array_keys   = array_map('lcfirst', array_keys($array));

        return array_combine($array_keys, $array_values);
    }

    public function getAssuranceByName($name)
    {
        $row = $this->getDbTable()->fetchRow('AssuranceName LIKE "%' . $name . '%"');

        $entry = new Application_Model_Assurances();
        $entry
                ->setAssuranceID($row->AssuranceID)
                ->setAssuranceName($row->AssuranceName);

        return $entry;
    }

    public function save(Application_Model_Assurances $assurance)
    {
        $data = array(
            'AssuranceID'   => $assurance->getAssuranceID(),
            'AssuranceName' => $assurance->getAssuranceName(),
        );

        if ('' === ($id = $assurance->getAssuranceID())) {
            $newID = $this->getDbTable()->insert($data);

            $assurance->setAssuranceID($newID);
        } else {
            $this->getDbTable()->update($data, array('AssuranceID = ?' => $assurance->getAssuranceID()));
        }
    }

}