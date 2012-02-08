<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
			$albums = new Application_Model_DbTable_Albums();
			$this->view->albums = $albums->fetchAll();
    }

    public function addAction()
    {
        $form = new Application_Form_Album();
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {        
       		$formData = $this->getRequest()->getPost();
       		$data = array(
       			'title'	=> $formData['title'],
       			'artist'	=> $formData['artist']
       		);
       		$albums = new Application_Model_DbTable_Albums();
					$albums->addAlbum($data);
					$this->_helper->redirector('index');
				}

    }

    public function deleteAction()
    {
     	$id = $this->_getParam('id',0);
     	$album = new Application_Model_DbTable_Albums;
     	$this->view->album = $album->getAlbum($id);   
     	if($this->getRequest()->getPost())
     	{
		 		$delete = $this->_getParam('delete');
     		if('Yes' == $delete)
     		{
     			$album = new Application_Model_DbTable_Albums();
     			$album->deleteAlbum($id);
	   		}     	
	     	$this->_helper->redirector('index');
     	}
    }
    
    public function editAction()
    {
     $form = new Application_Form_Album();
     $form->submit->setLabel('Save');
     $this->view->form = $form;
     $album = new Application_Model_DbTable_Albums();
     $id = $this->_getParam('id',0);
     $form->populate($album->getAlbum($id));
     if($this->getRequest()->isPost())
     {
     		$formData = $this->getRequest()->getPost();
     		$data = array(
     			'title' => $formData['title'],
     			'artist' => $formData['artist'],
     			);
     		$album = new Application_Model_DbTable_Albums();
     		$album->updateAlbum($data,$id);
     		$this->_helper->redirector('index');
     	}
    }


}







