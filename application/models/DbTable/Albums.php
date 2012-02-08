<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract
{
    protected $_name = 'albums';
		public function addAlbum($data)
		{
		
			$this->insert($data);
		}
		public function getAlbum($id)
		{
			$row = $this->fetchRow('id = '. $id);
			return $row->toArray();
		}
		public function updateAlbum($data,$id)
		{
			$this->update($data,'id= '. $id);
			
		}
		public function deleteAlbum($id)
		{
			$this->delete('id= '. $id);
		}

}

