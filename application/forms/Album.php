<?php

class Application_Form_Album extends Zend_Form
{

    public function init()
    {
        // Set the method for the display form to POST
        $this->setMethod('post');
 
        // Add an artist element
        $this->addElement('text', 'artist', array(
            'label'      => 'Artist name:',
            'required'   => true,
        ));
        
        //add title element
 				$this->addElement('text','title',array(
 						'label'	 			=>	'Enter album title:',
 						'required'	  => true,
         ));
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Create Album',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }


}

