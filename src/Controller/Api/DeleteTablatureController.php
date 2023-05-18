<?php namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;

use Vankosoft\ApplicationBundle\Component\Status;
use App\Entity\Tablature;

class DeleteTablatureController extends AbstractController
{
    /** @var TokenStorageInterface */
    private $tokenStorage;
    
    /** @var ManagerRegistry */
    private $doctrine;
    
    /** @var TranslatorInterface */
    private $translator;
    
    /** @var RepositoryInterface */
    private $tablaturesRepository;
    
    /** @var string */
    private $tablaturesDirectory;
    
    public function __construct(
        TokenStorageInterface $tokenStorage,
        ManagerRegistry $doctrine,
        TranslatorInterface $translator,
        RepositoryInterface $tablaturesRepository,
        string $tablaturesDirectory
    ) {
        $this->tokenStorage         = $tokenStorage;
        $this->doctrine             = $doctrine;
        $this->translator           = $translator;
        $this->tablaturesRepository = $tablaturesRepository;
        $this->tablaturesDirectory  = $tablaturesDirectory;
    }
    
    public function __invoke( $id, Request $request ): JsonResponse
    {
        $entity = $this->tablaturesRepository->find( $id );
        
        $this->removeTablatureFile( $entity );
        
        $em = $this->doctrine->getManager();
        $em->remove( $entity );
        $em->flush();
        
        return new JsonResponse([
            'status'   => Status::STATUS_OK,
            'message'  => $this->translator->trans( 'softuni_api.messages.resource_delete_successfull', [], 'SoftuniApi' ),
        ]);
    }
    
    private function removeTablatureFile( Tablature $tablature )
    {
        $em             = $this->doctrine->getManager();
        $fileTablature  = $this->tablaturesDirectory . '/' . $tablature->getTablatureFile()->getPath();
        
        $em->remove( $tablature->getTablatureFile() );
        $em->flush();
        
        $filesystem = new Filesystem();
        $filesystem->remove( $fileTablature );
    }
}
