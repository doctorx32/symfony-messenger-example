<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Message\LuckyNumberNotification;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
     * @Route("/lucky/number")
     * @param MessageBusInterface $bus
     * @return Response
     * @throws \Exception
     */
    public function number(MessageBusInterface $bus): Response
    {
        $number = random_int(0, 100);

        $bus->dispatch(new LuckyNumberNotification($number));

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
