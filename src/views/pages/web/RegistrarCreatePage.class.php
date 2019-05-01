<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/30/2019
 * Time: 8:22 PM
 */


namespace views\pages\web;

use views\forms\web\RegistrarForm;
use views\pages\UserDocument;

class RegistrarCreatePage extends UserDocument
{
    public function __construct()
    {
        parent::__construct('itsm_web-registrars-w', 'web');

        $this->setVariable('tabTitle', 'Registrar (New)');

        $form = new RegistrarForm();

        $this->setVariable('content', $form->getTemplate());
        $this->setVariable('formScript', 'return createRegistrar()');
    }
}