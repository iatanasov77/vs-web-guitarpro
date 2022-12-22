<?php namespace App\Controller\WebGuitarPro;

use Vankosoft\UsersBundle\Controller\RegisterController as BaseRegisterController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Vankosoft\UsersBundle\Security\UserManager;
use Vankosoft\UsersBundle\Security\AnotherLoginFormAuthenticator;

class RegisterController extends BaseRegisterController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        UserManager $userManager,
        RepositoryInterface $usersRepository,
        Factory $usersFactory,
        RepositoryInterface $userRolesRepository,
        MailerInterface $mailer,
        RepositoryInterface $pagesRepository,
        UserAuthenticatorInterface $guardHandler,
        AnotherLoginFormAuthenticator $authenticator,
        array $parameters,
        
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCode
    ) {
        parent::__construct( $doctrine, $userManager, $usersRepository, $usersFactory, $userRolesRepository, $mailer, $pagesRepository, $guardHandler, $authenticator, $parameters );

        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCode );
    }
    
    public function index( Request $request, MailerInterface $mailer ): Response
    {
        if ( $this->getUser() ) {
            return $this->redirectToRoute( $this->params['defaultRedirect'] );
        }
        
        if ( $request->isMethod( 'post' ) ) {
            return parent::index( $request, $mailer );
        }
        
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];

        return $this->render( '@VSUsers/Register/register.html.twig', array_merge( $params, $this->templateParams( $this->getForm() ) ) );
    }
}
