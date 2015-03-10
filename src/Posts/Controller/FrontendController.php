<?php

namespace Posts\Controller;

use Simplex\BaseController;

/**
 * Class FrontendController
 * @package Posts\Controller
 */
class FrontendController extends BaseController
{
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }
}
