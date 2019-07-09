<?php
/**
 * LLR Technologies & Associated Services
 * Information Systems Development
 *
 * Mercury MAP InfoScape
 *
 * User: lromero
 * Date: 4/10/2019
 * Time: 8:54 PM
 */


namespace views\pages\facilities;

use views\forms\facilities\LocationForm;

class LocationEditPage extends ModelPage
{
    public function __construct(?string $locationId)
    {
        parent::__construct("locations/$locationId", 'facilitiescore_facilities-w', 'buildings');

        $details = $this->response->getBody();

        $form = new LocationForm(array(
            'buildingId' => $details['buildingId'],
            'buildingCode' => $details['buildingCode'],
            'buildingName' => $details['buildingName'],
            'id' => $details['id'],
            'code' => $details['code'],
            'name' => $details['name']
        ));

        $this->setVariable("tabTitle", "Location: {$details['buildingName']}/{$details['name']} (Edit)");

        $this->setVariable("content", $form->getTemplate());
        $this->setVariable("formScript", "return saveChanges('{{@id}}', '{$details['buildingId']}')");
        $this->setVariable("id", $locationId);
        $this->setVariable("buildingId", $details['id']);
    }
}