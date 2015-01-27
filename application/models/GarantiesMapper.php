<?php

class Application_Model_GarantiesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Garanties');
    }

    public function fetchAllToArray($where = array())
    {
        $resultSet = $this->getDbTable()->fetchAll($where);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entries[$row->GarantieID] = $row->GarantieName;
        }
        return $entries;
    }

    public function fetchAll($where = array())
    {
        $resultSet = $this->getDbTable()->fetchAll($where);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Garanties();
            $entry->setGarantieID($row->GarantieID)
                    ->setGarantieName($row->GarantieName);

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

    public function save(Application_Model_Garanties $garantie)
    {
        $data = array(
            'GarantieID'          => $garantie->getGarantieID(),
            'AssuranceID'         => $garantie->getAssuranceID(),
            'GarantieName'        => $garantie->getGarantieName(),
            'GarantieDescription' => $garantie->getGarantieDescription(),
        );

        if ('' === ($id = $garantie->getGarantieID())) {
            $newID = $this->getDbTable()->insert($data);

            $garantie->setGarantieID($newID);
        } else {
            $this->getDbTable()->update($data, array('GarantieID = ?' => $garantie->getGarantieID()));
        }
    }

}
