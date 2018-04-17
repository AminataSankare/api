<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'api' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::index',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_getbien' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::getBienAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/biens',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_listbien' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::listBienAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/listbiens',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_detail' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::detailAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/detailsbiens',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_listereservation' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::ListeReservationAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/reserve',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_localite' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::LocaliteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/localite',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_typebien' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::TypeBienAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/typeBien',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_trouverlocalite' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::TrouverLocaliteAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/listeLocalite',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'app_biens_reservations' => array (  0 =>   array (    0 => 'id',  ),  1 =>   array (    '_controller' => 'App\\Controller\\BiensController::ReservationSAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/reservations',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
