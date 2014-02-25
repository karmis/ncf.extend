<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/api/core/organisations')) {
            // get_organisations
            if ($pathinfo === '/api/core/organisations') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_organisations;
                }

                return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\OrganisationController::cgetAction',  '_format' => 'json',  '_route' => 'get_organisations',);
            }
            not_get_organisations:

            // get_organisation
            if (preg_match('#^/api/core/organisations/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_get_organisation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_organisation')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\OrganisationController::getAction',  '_format' => 'json',));
            }
            not_get_organisation:

            // post_organisations
            if ($pathinfo === '/api/core/organisations') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_post_organisations;
                }

                return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\OrganisationController::cpostAction',  '_format' => 'json',  '_route' => 'post_organisations',);
            }
            not_post_organisations:

            // put_organisation
            if (preg_match('#^/api/core/organisations/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_put_organisation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'put_organisation')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\OrganisationController::putAction',  '_format' => 'json',));
            }
            not_put_organisation:

            // delete_organisation
            if (preg_match('#^/api/core/organisations/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_delete_organisation;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_organisation')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\OrganisationController::deleteAction',  '_format' => 'json',));
            }
            not_delete_organisation:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
