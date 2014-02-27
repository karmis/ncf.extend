<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/oauth/v2/auth_login')) {
            // brainstrap_oauth_auth_login
            if ($pathinfo === '/oauth/v2/auth_login') {
                return array (  '_controller' => 'Brainstrap\\OAuthBundle\\Controller\\SecurityController::loginAction',  '_route' => 'brainstrap_oauth_auth_login',);
            }

            // brainstrap_oauth_login_check
            if ($pathinfo === '/oauth/v2/auth_login_check') {
                return array (  '_controller' => 'Brainstrap\\OAuthBundle\\Controller\\SecurityController::loginCheckAction',  '_route' => 'brainstrap_oauth_login_check',);
            }

        }

        if (0 === strpos($pathinfo, '/api/core/c')) {
            if (0 === strpos($pathinfo, '/api/core/companies')) {
                // get_companies
                if ($pathinfo === '/api/core/companies') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_companies;
                    }

                    return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CompanyController::cgetAction',  '_format' => 'json',  '_route' => 'get_companies',);
                }
                not_get_companies:

                // get_company
                if (preg_match('#^/api/core/companies/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_company;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_company')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CompanyController::getAction',  '_format' => 'json',));
                }
                not_get_company:

                // post_companies
                if ($pathinfo === '/api/core/companies') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_post_companies;
                    }

                    return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CompanyController::cpostAction',  '_format' => 'json',  '_route' => 'post_companies',);
                }
                not_post_companies:

                // put_company
                if (preg_match('#^/api/core/companies/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_put_company;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'put_company')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CompanyController::putAction',  '_format' => 'json',));
                }
                not_put_company:

                // delete_company
                if (preg_match('#^/api/core/companies/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_delete_company;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_company')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CompanyController::deleteAction',  '_format' => 'json',));
                }
                not_delete_company:

            }

            if (0 === strpos($pathinfo, '/api/core/carts')) {
                // get_carts
                if ($pathinfo === '/api/core/carts') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_carts;
                    }

                    return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CartController::cgetAction',  '_format' => 'json',  '_route' => 'get_carts',);
                }
                not_get_carts:

                // get_cart
                if (preg_match('#^/api/core/carts/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_cart;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_cart')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CartController::getAction',  '_format' => 'json',));
                }
                not_get_cart:

                // post_carts
                if ($pathinfo === '/api/core/carts') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_post_carts;
                    }

                    return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CartController::cpostAction',  '_format' => 'json',  '_route' => 'post_carts',);
                }
                not_post_carts:

                // put_cart
                if (preg_match('#^/api/core/carts/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_put_cart;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'put_cart')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CartController::putAction',  '_format' => 'json',));
                }
                not_put_cart:

                // delete_cart
                if (preg_match('#^/api/core/carts/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_delete_cart;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_cart')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\CartController::deleteAction',  '_format' => 'json',));
                }
                not_delete_cart:

            }

            if (0 === strpos($pathinfo, '/api/core/clients')) {
                // get_clients
                if ($pathinfo === '/api/core/clients') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_clients;
                    }

                    return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\ClientController::cgetAction',  '_format' => 'json',  '_route' => 'get_clients',);
                }
                not_get_clients:

                // get_client
                if (preg_match('#^/api/core/clients/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_get_client;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'get_client')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\ClientController::getAction',  '_format' => 'json',));
                }
                not_get_client:

                // post_clients
                if ($pathinfo === '/api/core/clients') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_post_clients;
                    }

                    return array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\ClientController::cpostAction',  '_format' => 'json',  '_route' => 'post_clients',);
                }
                not_post_clients:

                // put_client
                if (preg_match('#^/api/core/clients/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_put_client;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'put_client')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\ClientController::putAction',  '_format' => 'json',));
                }
                not_put_client:

                // delete_client
                if (preg_match('#^/api/core/clients/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_delete_client;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_client')), array (  '_controller' => 'Brainstrap\\CoreBundle\\Controller\\ClientController::deleteAction',  '_format' => 'json',));
                }
                not_delete_client:

            }

        }

        if (0 === strpos($pathinfo, '/oauth/v2')) {
            // fos_oauth_server_token
            if ($pathinfo === '/oauth/v2/token') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_oauth_server_token;
                }

                return array (  '_controller' => 'fos_oauth_server.controller.token:tokenAction',  '_route' => 'fos_oauth_server_token',);
            }
            not_fos_oauth_server_token:

            // fos_oauth_server_authorize
            if ($pathinfo === '/oauth/v2/auth') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_oauth_server_authorize;
                }

                return array (  '_controller' => 'FOS\\OAuthServerBundle\\Controller\\AuthorizeController::authorizeAction',  '_route' => 'fos_oauth_server_authorize',);
            }
            not_fos_oauth_server_authorize:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
