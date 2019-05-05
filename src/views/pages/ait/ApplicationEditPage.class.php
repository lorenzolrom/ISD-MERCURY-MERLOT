<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury Merlot
 *
 * User: lromero
 * Date: 5/04/2019
 * Time: 11:15 AM
 */


namespace views\pages\ait;


use views\forms\ait\ApplicationForm;
use views\pages\ModelPage;

class ApplicationEditPage extends ModelPage
{
    public function __construct(?string $param)
    {
        parent::__construct("applications/$param", 'itsm_ait-apps-w', 'ait');

        $details = $this->response->getBody();

        $form = new ApplicationForm($details);

        $this->setVariable('tabTitle', "Application - " . htmlentities($details['name']) . " (Edit)");
        $this->setVariable('content', $form->getTemplate());
        $this->setVariable('cancelLink', "{{@baseURI}}ait/applications/{$details['number']}");
        $this->setVariable('formScript', "return save('{$details['number']}')");
    }
}