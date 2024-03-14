<?php

namespace Controller;

use Studoo\EduFramework\Core\Controller\ControllerInterface;
use Studoo\EduFramework\Core\Controller\Request;
use Studoo\EduFramework\Core\View\TwigCore;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class EncodeController implements ControllerInterface
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
        $encode_text = base64_encode($message);

        if(empty($message)){
            $encode_text = "Entrer une valeur SVP";
        }

        return TwigCore::getEnvironment()->render('home/encode.html.twig',
            [
                'titre'   => 'Encode',
                'requete' => $request,
                'message' => $encode_text ?? "",
            ]
        );
    }
}
