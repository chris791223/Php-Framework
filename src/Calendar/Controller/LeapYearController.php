<?php
declare(strict_types = 1);

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Simplex\ResponseEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController {
    public function indexAction(Request $request, $year) {

        $leapYear = new LeapYear();
        $response = new Response();
        if ($leapYear->isLeapYear($year)){
            $response->setContent('Yep, this is a leap year!' . rand());
        } else {
            $response->setContent('Nope, this is not a leap year.');
        }

        $response->setTtl(10);
        return $response;
    }
}
