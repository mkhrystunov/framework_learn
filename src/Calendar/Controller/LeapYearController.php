<?php

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    /**
     * @param Request $request
     * @param int $year
     * @return Response
     */
    public function indexAction(Request $request, $year)
    {
        $leapyear = new LeapYear();
        if ($leapyear->isLeapYear($year)) {
            return 'Yep, this is a leap year!';
        }
        return 'Nope, this is not a leap year.';
    }
}
