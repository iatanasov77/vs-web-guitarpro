<?php namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Vankosoft\ApplicationBundle\Component\SlugGenerator;
use Vankosoft\ApplicationBundle\Component\Status;
use App\Entity\Application\Taxonomy;

class CreateCategoryController extends AbstractController
{
    use TaxonomyHelperTrait;
    
    /** @var TokenStorageInterface */
    private $tokenStorage;
    
    /** @var ManagerRegistry */
    private $doctrine;
    
    /** @var TranslatorInterface */
    private $translator;
    
    /** @var Factory */
    private $tabCategoryFactory;
    
    /** @var RepositoryInterface */
    private $tabCategoryRepository;
    
    /** @var Factory */
    private $taxonFactory;
    
    /** @var RepositoryInterface */
    private $taxonRepository;
    
    /** @var SlugGenerator */
    private $slugGenerator;
    
    /** @var Taxonomy */
    private $taxonomy;
    
    public function __construct(
        TokenStorageInterface $tokenStorage,
        ManagerRegistry $doctrine,
        TranslatorInterface $translator,
        Factory $tabCategoryFactory,
        RepositoryInterface $tabCategoryRepository,
        Factory $taxonFactory,
        RepositoryInterface $taxonRepository,
        SlugGenerator $slugGenerator,
        RepositoryInterface $taxonomyRepository,
        string $taxonomyCode
    ) {
        $this->tokenStorage             = $tokenStorage;
        $this->doctrine                 = $doctrine;
        $this->translator               = $translator;
        $this->tabCategoryFactory       = $tabCategoryFactory;
        $this->tabCategoryRepository    = $tabCategoryRepository;
        $this->taxonFactory             = $taxonFactory;
        $this->taxonRepository          = $taxonRepository;
        $this->slugGenerator            = $slugGenerator;
        $this->taxonomy                 = $taxonomyRepository->findByCode( $taxonomyCode );
    }
    
    public function  __invoke( Request $request ): JsonResponse
    {
        // $request->get( "token" )
        $requestBody    = \json_decode( $request->getContent(), true );
        $entity         = $this->tabCategoryFactory->createNew();
        $parentCategory = $this->tabCategoryRepository->find( $requestBody['parentCategory'] );
        
        $entity->setUser( $this->getUser() );
        
        $newTaxon   = $this->createTaxon(
            $requestBody['name'],
            $request->getLocale(),
            $parentCategory ? $parentCategory->getTaxon() : null,
            $this->taxonomy->getId()
        );
        
        $entity->setTaxon( $newTaxon );
        $entity->setParent( $parentCategory );
    
        $em = $this->doctrine->getManager();
        $em->persist( $entity );
        $em->flush();
        
        return new JsonResponse([
            'status'    => Status::STATUS_OK,
            'message'   => $this->translator->trans( 'vs_api.messages.resource_create_successfull', [], 'VSApiBundle' ),
            'data'      => $entity,
        ]);
    }
}
