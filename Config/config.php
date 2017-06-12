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
    'name'        => 'Email-Sent',
    'description' => 'Create a Webhook to subscribe to email sent events',
    'version'     => '1.0',
    'author'      => 'Gustavo Cavalieri',
    'services'    => array(
        'events' => array(
            'plugin.emailsent.email.subscribe' => array(
                'class'     => 'MauticPlugin\EmailSentBundle\EventListener\CustomEmailSubscriber',
                'arguments' => [
                    'mautic.email.model.email'
                ]
            )
        ),
    )
];
