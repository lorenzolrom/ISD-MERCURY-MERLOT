<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 4/30/2019
 * Time: 7:18 PM
 */


namespace views\forms\web;


use views\forms\Form;

class RegistrarForm extends Form
{
    /**
     * RegistrarForm constructor.
     * @param array|null $details
     * @throws \exceptions\ViewException
     */
    public function __construct(?array $details = NULL)
    {
        $this->setTemplateFromHTML('web/RegistrarForm', self::TEMPLATE_FORM);

        if($details !== NULL)
            $this->setVariables($details);
    }
}