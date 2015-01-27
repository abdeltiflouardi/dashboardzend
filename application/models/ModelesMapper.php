<?php

class Application_Model_ModelesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Modeles');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array('' => '-----');
        foreach ($resultSet as $row) {
            $entries[$row->ModeleID] = $row->ModeleName;
        }
        return $entries;
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Modeles();
            $entry->setModeleID($row->ModeleID)
                    ->setModeleName($row->ModeleName);
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

    public function save(Application_Model_Modeles $model)
    {
        $data = array(
            'ModeleID' => $model->getModeleID(),
            'MarqueID' => $model->getMarqueID(),
            'ModeleName' => $model->getModeleName(),
        );

        if ('' === ($id = $model->getModeleID())) {
            $newID = $this->getDbTable()->insert($data);

            $model->setModeleID($newID);
        } else {
            $this->getDbTable()->update($data, array('ModeleID = ?' => $model->getModeleID()));
        }
    }

}

