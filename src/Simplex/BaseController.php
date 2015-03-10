<?php

namespace Simplex;

use Symfony\Component\HttpFoundation\Response;

class BaseController
{
    /** @var \Twig_Environment */
    private $twig;

    /**
     * @param string $template
     * @param array|null $values
     * @return string
     */
    protected function render($template, array $values = null)
    {
        if (!$this->twig) {
            $reflection = new \ReflectionClass(get_class($this));
            $dir = dirname($reflection->getFileName());
            $loader = new \Twig_Loader_Filesystem($dir . '/../Templates');
            $this->twig = new \Twig_Environment($loader);
        }
        return new Response($this->twig->render($template, $values ?: []));
    }
}
