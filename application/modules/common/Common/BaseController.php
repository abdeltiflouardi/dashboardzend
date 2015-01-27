<?php

class Common_BaseController extends Zend_Controller_Action
{

    public function getPageItems($entity)
    {
        $entity = new $entity();

        return $entity->fetchAll();
    }

    public function paginator($modelName, $where = array())
    {
        $model = new $modelName();

        $select = $model->getDbTable()->select();

        if (!empty($where)) {
            foreach ($where as $field => $value) {
                $select->where($field, $value);
            }
        }

        $adapter = new Zend_Paginator_Adapter_DbSelect($select);
        $page    = new Zend_Paginator($adapter);
        $page->setPageRange(5);
        $page->setCurrentPageNumber($this->_getParam('page', 1));
        $page->setItemCountPerPage($this->_getParam('per_page', 5));

        return $page;
    }

}