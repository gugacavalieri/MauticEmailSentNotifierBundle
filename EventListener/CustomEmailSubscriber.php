<?php
/*
* @copyright   2017 Mautic Contributors. All rights reserved
* @author      Mautic
*
* @link        http://mautic.org
*
* @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/
namespace MauticPlugin\MauticEmailSentNotifierBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Mautic\EmailBundle\EmailEvents;
use Mautic\EmailBundle\Event\EmailSendEvent;
use MauticPlugin\MauticEmailSentNotifierBundle\Helper\EmailSentHelper;
/**
* Class EmailSubscriber.
*/
class CustomEmailSubscriber implements EventSubscriberInterface
{

    /**
    * @return array
    */
    public static function getSubscribedEvents()
    {
        return [
            EmailEvents::EMAIL_ON_SEND    => ['onEmailGenerate', 0]
        ];
    }

    /**
    * @param EmailSendEvent $event
    */
    public function onEmailGenerate(EmailSendEvent $event)
    {

        /* check if integration is published and authorized */
        if(EmailSentHelper::isAuthorized()) {
            $integration = EmailSentHelper::getIntegration();
            $webhookUrl = $integration->getUrl();
            $apiKey = $integration->getApiKey();
            $baseUrl = $integration->getBaseUrl();
            EmailSentHelper::postSentEvent($webhookUrl, $event, $apiKey, $baseUrl);
        }
    }
}
