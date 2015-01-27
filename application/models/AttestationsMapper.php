<?php

class Application_Model_AttestationsMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Attestations');
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Attestations();
            $entry->setAttestationID($row->AttestationID);
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

    public function save(Application_Model_Attestations $attestation)
    {
        $data = array(
            'AttestationID' => $attestation->getAttestationID(),
        );

        if ('' === ($id = $attestation->getAttestationID())) {
            $newID = $this->getDbTable()->insert($data);

            $attestation->setAttestationID($newID);
        } else {
            $this->getDbTable()->update($data, array('AttestationID = ?' => $attestation->getAttestationID()));
        }
    }

}