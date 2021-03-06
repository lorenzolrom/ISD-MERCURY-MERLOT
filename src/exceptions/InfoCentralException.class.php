<?php
/**
  * LLR Technologies
 * part of LLR Enterprises - www.llrweb.com/technologies
 *
 * Mercury Application Platform
 * InfoScape
 *
 * User: lromero
 * Date: 4/07/2019
 * Time: 3:44 PM
 */


namespace exceptions;


class InfoCentralException extends MercuryException
{
    const IC_RESPONDED_500 = 1300;

    const MESSAGES = array(
        self::IC_RESPONDED_500 => 'The InfoCentral server did not provide a valid response'
    );
}
