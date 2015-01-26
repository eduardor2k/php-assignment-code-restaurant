<?php
namespace Adress\Controller;

use Framework\Controller as Framework;

class Adress extends Framework\Base
{
    /**
     * This method will return all the adresses if no id is set
     *
     * @return array
     */
    public function getIndexAction()
    {
        $id = $this->getRequest()->getParameter('id',FILTER_SANITIZE_NUMBER_INT);
        $model = new \Adress\Model\Adress();
        if(!$id)
        {
            return $model->getAll();
        }
        try
        {
            return $model->getAdress($id);
        }
        catch(\Adress\Model\AdressNotFoundException $e)
        {
            $this->getResponse()->setStatusCode(404);
            return array();
        }
    }

    /**
     * This method will add an adress
     *
     * @return boolean
     */
    public function postIndexAction()
    {
        $name = $this->getRequest()->getParameter('name',FILTER_SANITIZE_STRING);
        $phone = $this->getRequest()->getParameter('phone',FILTER_SANITIZE_NUMBER_INT);
        $adress = $this->getRequest()->getParameter('adress',FILTER_SANITIZE_STRING);
        $model = new \Adress\Model\Adress();
        return $model->insert($name,$phone,$adress);
    }

    /**
     * This method will update an element
     *
     * @return array
     */
    public function putIndexAction()
    {
        $id = $this->getRequest()->getParameter('id',FILTER_SANITIZE_NUMBER_INT);
        $name = $this->getRequest()->getParameter('name',FILTER_SANITIZE_STRING);
        $phone = $this->getRequest()->getParameter('phone',FILTER_SANITIZE_NUMBER_INT);
        $adress = $this->getRequest()->getParameter('adress',FILTER_SANITIZE_STRING);
        $model = new \Adress\Model\Adress();
        try
        {
            return $model->update($id,$name,$phone,$adress);
        }
        catch(\Adress\Model\AdressNotFoundException $e)
        {
            $this->getResponse()->setStatusCode(404);
            return array();
        }
    }

    public function deleteIndexAction()
    {
        $id = $this->getRequest()->getParameter('id',FILTER_SANITIZE_NUMBER_INT);
        $model = new \Adress\Model\Adress();
        try
        {
            return $model->delete($id);
        }
        catch(\Adress\Model\AdressNotFoundException $e)
        {
            $this->getResponse()->setStatusCode(404);
            return array();
        }
    }

    /**
     * This method will create the table adress
     */
    public function getCreateTableAction()
    {
        $model = new \Adress\Model\Adress();
        return $model->createTable();
    }

    /**
     * This method will create the table adress
     */
    public function getTruncateTableAction()
    {
        $model = new \Adress\Model\Adress();
        return $model->truncateTable();
    }
}