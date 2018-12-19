<?php

/*
 * @copyright   2017 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\MauticEmailSentNotifierBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class EmailSentNotifierIntegration extends AbstractIntegration
{
    public function getName()
    {
        return 'EmailSentNotifier';
    }

    /**
     * Return's authentication method such as oauth2, oauth1a, key, etc.
     *
     * @return string
     */
    public function getAuthenticationType()
    {
        // Just use none for now and I'll build in "basic" later
        return 'none';
    }

    /**
     * Return array of key => label elements that will be converted to inputs to
     * obtain from the user.
     *
     * @return array
     */
    public function getRequiredKeyFields()
    {
        return [
            'webhookUrl' => 'mautic.integration.emailsentnotifier.webhookUrl',
            'apiKey' => 'mautic.integration.emailsentnotifier.apiKey',
            'mauticBaseUrl' => 'mautic.integration.emailsentnotifier.mauticBaseUrl',
        ];
    }

    /**
    *   get web hook url key
    *
    *   @return Webhook Url
    */
    public function getUrl()
    {
        $keys = $this->getKeys();
        return $keys['webhookUrl'];
    }

    /**
    *   get API Key to be sent for validation
    *
    *   @return API Key
    */
    public function getApiKey()
    {
        $keys = $this->getKeys();
        return $keys['apiKey'];
    }

    /**
    *   get Base Url
    *
    *   @return Base Url as String
    */
    public function getBaseUrl()
    {
        $keys = $this->getKeys();
        return $keys['mauticBaseUrl'];
    }

}
