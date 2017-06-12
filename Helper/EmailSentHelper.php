<?php

/*
* @copyright   2017 Mautic Contributors. All rights reserved
* @author      Mautic
*
* @link        http://mautic.org
*
* @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

namespace MauticPlugin\EmailSentBundle\Helper;

use Mautic\PluginBundle\Helper\IntegrationHelper;


class EmailSentHelper
{

    /**
    * @var IntegrationHelper
    */
    private static $integratonHelper;

    /**
    * @param IntegrationHelper $helper
    * @param LoggerInterface   $logger
    */
    public static function init(IntegrationHelper $helper)
    {
        self::$integratonHelper = $helper;
    }


    /**
    * @param $integration
    *
    * @return AbstractIntegration
    */
    public static function getIntegration()
    {
        try {
            return self::$integratonHelper->getIntegrationObject('EmailSent');
        } catch (\Exception $e) {
            // do nothing
        }

        return null;
    }

    /**
    * @param $integration string
    *
    * @return bool
    */
    public static function isAuthorized()
    {
        $myIntegration = self::getIntegration();
        return $myIntegration && $myIntegration->getIntegrationSettings() && $myIntegration->getIntegrationSettings()->getIsPublished();
    }

    /**
    * @param $integration string
    *
    * @return bool
    */
    public static function postSentEvent($url, $event, $key, $baseUrl = '')
    {

        if(!empty($url)) {

            $data_string = json_encode([
            'email' => [
                'subject' => $event->getSubject(),
                'hash' => $event->getIdHash(),
                'lead' => $event->getLead(),
                'viewUrl' => $baseUrl . '/email/view/' . $event->getIdHash(),
            ],
            'key' => $key,
        ]);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );

            $result = curl_exec($ch);
        }

    }


}
