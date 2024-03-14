<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class DecodeController implements ControllerInterface
{
    /**
     * @param Request $request Requête HTTP
     * @return string|null
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function execute(Request $request): string|null
    {
        echo("© All Right Reserved By TOMMY :)");
        $message = $request->getVars()["message"];
        $decode_text = base64_decode($message);

        if(empty($message)){
            $decode_text = "Entrer une valeur SVP";
        }

        return TwigCore::getEnvironment()->render('home/decode.html.twig',
            [
                'titre'   => 'Decode',
                'requete' => $request,
                'message' => $decode_text ?? "",
            ]
        );
    }
}
