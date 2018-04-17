<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/api')) {
            // api
            if ('/api' === $pathinfo) {
                return array (  '_controller' => 'App\\Controller\\BiensController::index',  '_route' => 'api',);
            }

            // app_biens_getbien
            if ('/api/biens' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\BiensController::getBienAction',  '_route' => 'app_biens_getbien',);
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_app_biens_getbien;
                }

                return $ret;
            }
            not_app_biens_getbien:

            if (0 === strpos($pathinfo, '/api/l')) {
                // app_biens_listbien
                if ('/api/listbiens' === $pathinfo) {
                    $ret = array (  '_controller' => 'App\\Controller\\BiensController::listBienAction',  '_route' => 'app_biens_listbien',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_biens_listbien;
                    }

                    return $ret;
                }
                not_app_biens_listbien:

                // app_biens_trouverlocalite
                if (0 === strpos($pathinfo, '/api/listeLocalite') && preg_match('#^/api/listeLocalite/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                    $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'app_biens_trouverlocalite')), array (  '_controller' => 'App\\Controller\\BiensController::TrouverLocaliteAction',));
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_biens_trouverlocalite;
                    }

                    return $ret;
                }
                not_app_biens_trouverlocalite:

                // app_biens_localite
                if ('/api/localite' === $pathinfo) {
                    $ret = array (  '_controller' => 'App\\Controller\\BiensController::LocaliteAction',  '_route' => 'app_biens_localite',);
                    if (!in_array($canonicalMethod, array('GET'))) {
                        $allow = array_merge($allow, array('GET'));
                        goto not_app_biens_localite;
                    }

                    return $ret;
                }
                not_app_biens_localite:

            }

            // app_biens_detail
            if (0 === strpos($pathinfo, '/api/detailsbiens') && preg_match('#^/api/detailsbiens/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'app_biens_detail')), array (  '_controller' => 'App\\Controller\\BiensController::detailAction',));
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_app_biens_detail;
                }

                return $ret;
            }
            not_app_biens_detail:

            // app_biens_listereservation
            if ('/api/reserve' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\BiensController::ListeReservationAction',  '_route' => 'app_biens_listereservation',);
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_app_biens_listereservation;
                }

                return $ret;
            }
            not_app_biens_listereservation:

            // app_biens_reservations
            if (0 === strpos($pathinfo, '/api/reservations') && preg_match('#^/api/reservations/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, array('_route' => 'app_biens_reservations')), array (  '_controller' => 'App\\Controller\\BiensController::ReservationSAction',));
                if (!in_array($requestMethod, array('POST'))) {
                    $allow = array_merge($allow, array('POST'));
                    goto not_app_biens_reservations;
                }

                return $ret;
            }
            not_app_biens_reservations:

            // app_biens_typebien
            if ('/api/typeBien' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\BiensController::TypeBienAction',  '_route' => 'app_biens_typebien',);
                if (!in_array($canonicalMethod, array('GET'))) {
                    $allow = array_merge($allow, array('GET'));
                    goto not_app_biens_typebien;
                }

                return $ret;
            }
            not_app_biens_typebien:

        }

        if ('/' === $pathinfo) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
