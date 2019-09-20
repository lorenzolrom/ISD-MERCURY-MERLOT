<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury MAP Navigator
 *
 * User: lromero
 * Date: 9/01/2019
 * Time: 1:32 PM
 */


namespace views\pages\tickets;


use views\forms\tickets\TicketForm;

class TicketEditPage extends PopupModelPage
{
    public function __construct(?string $number)
    {
        parent::__construct('tickets/workspaces/' . (int)$_COOKIE['ML_agentWorkspace'] . '/tickets/' . $number);

        $details = $this->response->getBody();

        $form = new TicketForm((int)$_COOKIE['ML_agentWorkspace'], $details);

        $this->setVariable('content', $form->getTemplate());
        $this->setVariable('tabTitle', 'Editing Ticket #' . $number);
        $this->setVariable('cancelLink', '{{@baseURI}}tickets/agent/' . $number);
        $this->setVariable('formScript', "return update('$number');");
        $this->setVariables($details);
    }
}