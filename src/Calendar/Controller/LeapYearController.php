<?php

namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Simplex\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LeapYearController
 * @package Calendar\Controller
 */
class LeapYearController extends BaseController
{
    /**
     * @param Request $request
     * @param int $year
     * @return Response
     */
    public function indexAction(Request $request, $year)
    {
        $leapyear = new LeapYear();
        return $this->render('leap.html.twig', [
            'test' => 'test',
            'is_leap' => $leapyear->isLeapYear($year),
        ]);
    }
}
