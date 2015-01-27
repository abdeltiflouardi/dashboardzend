<?php

class Application_Model_UsagesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Usages');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entries[$row->UsageID] = $row->UsageName;
        }
        return $entries;
    }   

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Usages();
            $entry->setUsageID($row->UsageID)
                    ->setUsageName($row->UsageName);
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
    
    public function save(Application_Model_Usages $usage)
    {
        $data = array(
            'UsageID' => $usage->getUsageID(),
            'UsageName' => $usage->getUsageName(),
        );

        if ('' === ($id = $usage->getUsageID())) {
            $newID = $this->getDbTable()->insert($data);

            $usage->setUsageID($newID);
        } else {
            $this->getDbTable()->update($data, array('UsageID = ?' => $usage->getUsageID()));
        }
    }    

}

