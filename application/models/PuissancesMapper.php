<?php

class Application_Model_PuissancesMapper extends Application_Model_BaseModelsMapper
{

    public function __construct()
    {
        parent::setDbTable('Application_Model_DbTable_Puissances');
    }

    public function fetchAllToArray()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array('' => '-----');
        foreach ($resultSet as $row) {
            $entries[$row->PuissanceID] = sprintf('%s - %s', $row->PuissanceNbChevDe, $row->PuissanceNbChevA);
        }
        return $entries;
    }

    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Puissances();
            $entry->setPuissanceID($row->PuissanceID)
                    ->setPuissanceNbChevDe($row->PuissanceNbChevDe)
                    ->setPuissanceNbChevA($row->PuissanceNbChevA);
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

    public function save(Application_Model_Puissances $puissance)
    {
        $data = array(
            'PuissanceID' => $puissance->getPuissanceID(),
            'CarburantID' => $puissance->getCarburantID(),
            'PuissanceNbChevDe' => $puissance->getPuissanceNbChevDe(),
            'PuissanceNbChevA' => $puissance->getPuissanceNbChevA(),
        );

        if ('' === ($id = $puissance->getPuissanceID())) {
            $newID = $this->getDbTable()->insert($data);

            $puissance->setPuissanceID($newID);
        } else {
            $this->getDbTable()->update($data, array('PuissanceID = ?' => $puissance->getPuissanceID()));
        }
    }

}

