<?php namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Vankosoft\ApplicationBundle\Component\Status;

class DeleteCategoryController extends AbstractController
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
    
    public function __invoke( $id, Request $request ): JsonResponse
    {
        $entity = $this->tabCategoryRepository->find( $id );
        
        $em = $this->doctrine->getManager();
        $em->remove( $entity );
        $em->flush();
        
        return new JsonResponse([
            'status'    => Status::STATUS_OK,
            'message'   => $this->translator->trans( 'vs_api.messages.resource_delete_successfull', [], 'VSApiBundle' ),
            'data'      => [
                'id' => $id,
            ]
        ]);
    }
}
