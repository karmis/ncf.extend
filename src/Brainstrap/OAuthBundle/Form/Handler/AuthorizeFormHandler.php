<?php
/**
 * Created by PhpStorm.
 * User: karmis
 * Date: 20.03.14
 * Time: 23:18
 */

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Brainstrap\OAuthBundle\Form\Model\Authorize;
use Symfony\Component\Security\Core\SecurityContextInterface;
use OAuth2\OAuth2;
use OAuth2\OAuth2ServerException;
use OAuth2\OAuth2RedirectException;

class AuthorizeFormHandler
{
    protected $request;
    protected $form;
    protected $context;
    protected $oauth2;

    public function __construct(Form $form, Request $request, SecurityContextInterface $context, OAuth2 $oauth2)
    {
        $this->form = $form;
        $this->request = $request;
        $this->context = $context;
        $this->oauth2 = $oauth2;
    }

    public function process(Authorize $authorize)
    {
        $this->form->setData($authorize);

        if ($this->request->getMethod() == 'POST') {

            $this->form->bind($this->request);

            if ($this->form->isValid()) {

                try {
                    $user = $this->context->getToken()->getUser();
                    return $this->oauth2->finishClientAuthorization(true, $user, $this->request, null);
                } catch (OAuth2ServerException $e) {
                    return $e->getHttpResponse();
                }

            }

        }

        return false;
    }

}