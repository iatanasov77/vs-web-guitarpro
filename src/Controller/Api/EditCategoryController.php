<?php namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Vankosoft\ApplicationBundle\Component\Status;
use App\Entity\TablatureCategory;

class EditCategoryController extends AbstractController
{
    /** @var TokenStorageInterface */
    private $tokenStorage;
    
    /** @var ManagerRegistry */
    private $doctrine;
    
    /** @var TranslatorInterface */
    private $translator;
    
    /** @var RepositoryInterface */
    private $tabCategoryRepository;
    
    public function __construct(
        TokenStorageInterface $tokenStorage,
        ManagerRegistry $doctrine,
        TranslatorInterface $translator,
        RepositoryInterface $tabCategoryRepository
    ) {
        $this->tokenStorage             = $tokenStorage;
        $this->doctrine                 = $doctrine;
        $this->translator               = $translator;
        $this->tabCategoryRepository    = $tabCategoryRepository;
    }
    
    public function  __invoke( $id, Request $request ): TablatureCategory
    {
        // $request->get( "token" )
        $requestBody    = \json_decode( $request->getContent(), true );
        $entity         = $this->tabCategoryRepository->find( $id );
        $parentCategory = $this->tabCategoryRepository->find( $requestBody['parentCategory'] );
        
        $entity->getTaxon()->setCurrentLocale( $request->getLocale() );
        $entity->getTaxon()->setName( $requestBody['name'] );
        if ( $parentCategory ) {
            $entity->getTaxon()->setParent( $parentCategory->getTaxon() );
        }
        
        $entity->setParent( $parentCategory );
        
        $em = $this->doctrine->getManager();
        $em->persist( $entity );
        $em->flush();
        
        /*
        return new JsonResponse([
            'status'    => Status::STATUS_OK,
            'message'  => $this->translator->trans( 'vs_api.messages.resource_update_successfull', [], 'VSApiBundle' ),
            'data'      => $entity,
        ]);
        */
        return $entity;
    }
}
