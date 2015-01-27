<?php

class Application_Model_AssureursMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Assureurs');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array('' => '-----');
        foreach ($resultSet as $row) {
            $entries[$row->AssureurID] = $row->AssureurName;
        }
        return $entries;
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry     = new Application_Model_Assureurs();
            $entry->setAssureurID($row->AssureurID)
                    ->setAssureurName($row->AssureurName);
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

    public function save(Application_Model_Assureurs $assureur)
    {
        $data = array(
            'AssureurID'          => $assureur->getAssureurID(),
            'AssureurName'        => $assureur->getAssureurName(),
            'AssureurAdresse'     => $assureur->getAssureurAdresse(),
            'AssureurCodePostal'  => $assureur->getAssureurCodePostal(),
            'AssureurVille'       => $assureur->getAssureurVille(),
            'AssureurDescription' => $assureur->getAssureurDescription(),
            'AssureurEmail'       => $assureur->getAssureurEmail(),
            'AssureurFax'         => $assureur->getAssureurFax(),
            'AssureurTelephone'   => $assureur->getAssureurTelephone(),
            'AssureurVille'       => $assureur->getAssureurVille(),
        );

        if ($assureur->getAssureurLogo()) {
            $data['AssureurLogo'] = $assureur->getAssureurLogo();
        }

        if ('' === ($id = $assureur->getAssureurID())) {
            $newID = $this->getDbTable()->insert($data);

            $assureur->setAssureurID($newID);
        } else {
            $this->getDbTable()->update($data, array('AssureurID = ?' => $assureur->getAssureurID()));
        }
    }

}