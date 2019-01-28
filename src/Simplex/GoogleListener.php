<?php

declare(strict_types=1);

namespace Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class GoogleListener implements EventSubscriberInterface
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        if ($response->isRedirect()
            || ($response->headers->has('Content-Type')
                && strpos($response->headers->get('Content-Type'), 'html') === false)
            || $event->getRequest()->getRequestFormat() !== 'html'
        ) {
            return;
        }

        $response->setContent($response->getContent() . 'GA CODE');
    }
    
    public static function getSubscribedEvents()
    {
        return array('response' => 'onResponse');
    }
}