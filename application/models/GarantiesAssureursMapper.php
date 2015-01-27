<?php

class Application_Model_GarantiesAssureursMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_GarantiesAssureurs');
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_TarificationsAuto();
            $entry->setTarificationID($row->TarificationID)
                    ->setPrime($row->Prime);
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

    public function save(Application_Model_GarantiesAssureurs $garantie)
    {
        $data = array(
            'GarantieID'     => $garantie->getGarantieID(),
            'AssuranceID'    => $garantie->getAssuranceID(),
            'AssureurID'     => $garantie->getAssureurID(),
        );

        $newID = $this->getDbTable()->insert($data);
    }

    public function delete($where)
    {
        $table = $this->getDbTable();
        $deleteWhere = array();
        foreach ($where as $field => $value) {
            if (strpos('?', $field) === false) {
                $field = sprintf('%s=?', $field);
            }

            $deleteWhere[] = $table->getAdapter()->quoteInto($field, $value);
        }

        if (!empty($deleteWhere)) {
            $table->delete($deleteWhere);        
        }
    }

    public function fetchAllByAssureurAssurance($assureurId, $assuranceId)
    {
        $resultSet = $this->getDbTable()->fetchAll(array('AssureurID = ?' => $assureurId, 'AssuranceID = ?' => $assuranceId));
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_GarantiesAssureurs();
            $entry
                    ->setGarantieID($row->GarantieID)
                    ->setAssureurID($row->AssureurID)
                    ->setAssuranceID($row->AssuranceID);

            $entries[] = $entry;
        }

        return $entries;
    }
}
