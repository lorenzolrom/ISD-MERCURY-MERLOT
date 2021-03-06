<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 5/11/2020
 * Time: 7:05 PM
 */


namespace extensions\cliff\views\pages;


use extensions\cliff\views\forms\KeyForm;

class KeyCreatePage extends CliffDocument
{
    public function __construct()
    {
        parent::__construct('cliff-w', 'records');

        $this->setVariable('tabTitle', 'Key (New)');

        $form = new KeyForm();
        $this->setVariable('content', $form->getTemplate());
        $this->setVariable('formScript', 'create()');
        $this->setVariable('createToolbar', self::templateFileContents('KeyFormCreateToolbar', self::TEMPLATE_ELEMENT, 'cliff'));
    }
}
