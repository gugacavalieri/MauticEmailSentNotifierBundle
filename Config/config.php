<?php

/*
 * @copyright   2017 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'name'        => 'Email Sent Notifier',
    'description' => 'Create a Webhook to subscribe to email sent events',
    'version'     => '1.0.1',
    'author'      => 'Gustavo Cavalieri',
    'services'    => array(
        'integrations' => array(
            'mautic.integration.emailsentnotifier' => array(
                'class'     => '\MauticPlugin\MauticEmailSentNotifierBundle\Integration\EmailSentNotifierIntegration',
                'arguments' => array(
                    'event_dispatcher',
                    'mautic.helper.cache_storage',
                    'doctrine.orm.entity_manager',
                    'session',
                    'request_stack',
                    'router',
                    'translator',
                    'logger',
                    'mautic.helper.encryption',
                    'mautic.lead.model.lead',
                    'mautic.lead.model.company',
                    'mautic.helper.paths',
                    'mautic.core.model.notification',
                    'mautic.lead.model.field',
                    'mautic.plugin.model.integration_entity',
                    'mautic.lead.model.dnc',
                ),
            ),
        ),
        'events' => array(
            'plugin.emailsentnotifier.email.subscribe' => array(
                'class'     => 'MauticPlugin\MauticEmailSentNotifierBundle\EventListener\CustomEmailSubscriber',
                'arguments' => [
                    'mautic.email.model.email'
                ]
            )
        ),
    )
];
