<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class DownloadTablatureController extends AbstractController
{
    /** @var EntityRepository */
    protected EntityRepository $tabsRepository;
    
    /** @var string */
    protected string $tabsDirectory;
    
    public function __construct(
        EntityRepository $tabsRepository,
        string $tabsDirectory
    ) {
        $this->tabsRepository       = $tabsRepository;
        $this->tabsDirectory        = $tabsDirectory;
    }
    
    public function download( $id, $originalName, Request $request ): Response
    {
        //die( $id );
        $oTablature     = $this->tabsRepository->find( $id );
        
        $fileTablature  = $this->tabsDirectory . '/' . $oTablature->getTablatureFile()->getPath();
        
        $response       = new BinaryFileResponse( $fileTablature, 200, ["Content-Type" => "audio/x-guitar-pro"] );
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $oTablature->getTablatureFile()->getOriginalName()
        );
        
        return $response;
    }
}
