<?php
namespace Brainstrap\CoreBundle\Exception;

/**
 * NotFoundHttpException.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ValidateHttpException extends \RunTimeException implements BrainstrapCoreBundleExceptionInterface
{
    public function __construct($code = 0, $message = null, \Exception $previous = null, array $headers = array())
    {
        $this->statusCode = $code;
        $this->headers = $headers;
        $json = array(
            "code" => $code,
            "msg" => $message
        );
        parent::__construct(json_encode($json), $code, $previous);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getHeaders()
    {
        return $this->headers;
    }
}