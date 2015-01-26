<?php
namespace Adress\Model;

class Adress extends \Framework\Db\Base
{
    /**
     * Returns all the elements in the adress table
     *
     * @return array
     */
    public function getAll()
    {
        return $this->getDbService()->query('SELECT * FROM address')->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Returns an adress
     *
     * @param integer $id
     * @return boolean
     * @throws AdressNotFoundException
     */
    public function getAdress($id)
    {
        $query = $this->getDbService()->prepare('SELECT * FROM address WHERE id = :adressId');
        $query->execute(array(':adressId' => $id));
        $result = $query->fetch(\PDO::FETCH_ASSOC);
        if(!$result)
        {
            throw new AdressNotFoundException('Not found Adress with id = '.$id);
        }
        return $result;
    }

    /**
     * This method will insert an element into adress
     *
     * @param string $name
     * @param integer $phone
     * @param string $adress
     * @return boolean
     */
    public function insert($name,$phone,$adress)
    {
        $result = $this->getDbService()->query('SELECT max(id) as newId FROM address')->fetch();
        $this->getDbService()->prepare(
            'INSERT INTO address(id,`name`,adress,phone) VALUES(:id,:name,:adress,:phone);')
            ->execute(
                array(
                    ':id' => $result['newId']+1,
                    ':name' => $name,
                    ':adress' => $adress,
                    ':phone' => $phone,
                )
            );
        return $this->getAdress($result['newId']+1);
    }

    /**
     * This method will update an adress
     *
     * @param integer $id
     * @param string $name
     * @param integer $phone
     * @param string $adress
     * @return array
     */
    public function update($id,$name,$phone,$adress)
    {
        $this->getDbService()->prepare(
            'UPDATE address SET `name` = :name, adress = :adress, phone=:phone WHERE id = :id;')
            ->execute(
                array(
                    ':id' => $id,
                    ':name' => $name,
                    ':adress' => $adress,
                    ':phone' => $phone,
                )
            );
        return $this->getAdress($id);
    }

    /**
     * This method will delete an item from adresses
     *
     * @param integer $id
     * @return boolean
     */
    public function delete($id)
    {
        $this->getAdress($id);
        $query = $this->getDbService()->prepare('DELETE FROM address WHERE id = :id');
        $query->execute(array(':id' => $id));
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * This method will create the table
     *
     * @return \PDOStatement
     */
    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `address` (
          `id` int(11) NOT NULL,
          `name` varchar(32) DEFAULT NULL,
          `adress` varchar(32) DEFAULT NULL,
          `phone` varchar(16) NOT NULL,
          PRIMARY KEY (`id`)
        )";
        return $this->getDbService()->query($sql)->fetch();
    }

    /**
     * This method will truncate the table
     *
     * @return \PDOStatement
     */
    public function truncateTable()
    {
        $sql = "DELETE FROM address;";
        return $this->getDbService()->query($sql)->fetch();
    }
}

class AdressNotFoundException extends \Framework\Db\ElementNotFoundException{}