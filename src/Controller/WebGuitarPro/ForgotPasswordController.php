<?php namespace App\Controller\WebGuitarPro;

use Vankosoft\UsersBundle\Controller\ForgotPasswordController as BaseForgotPasswordController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use SymfonyCasts\Bundle\ResetPassword\Exception\ExpiredResetPasswordTokenException;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\UsersBundle\Repository\ResetPasswordRequestRepository;
use Vankosoft\UsersBundle\Security\UserManager;

class ForgotPasswordController extends BaseForgotPasswordController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        ResetPasswordRequestRepository $repository,
        RepositoryInterface $usersRepository,
        MailerInterface $mailer,
        Factory $resetPasswordRequestFactory,
        UserManager $userManager,
        array $parameters,
        
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        parent::__construct( $doctrine, $repository, $usersRepository, $mailer, $resetPasswordRequestFactory, $userManager, $parameters );
        
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );;
    }
    
    public function indexAction( Request $request, MailerInterface $mailer ) : Response
    {
        if ( $request->isMethod( 'post' ) ) {
            return parent::indexAction( $request, $mailer );
        }
        
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        return $this->render( '@VSUsers/Resetting/forgot_password.html.twig', $params );
    }
    
    public function resetAction( string $token, Request $request ) : Response
    {
        $tokenExpired   = false;
        try {
            $oUser   = $this->resetPasswordHelper->validateTokenAndFetchUser( $token );
        } catch ( ExpiredResetPasswordTokenException $e ) {
            $tokenExpired   = true;
        }
        
        if ( $request->isMethod( 'post' ) && ! $tokenExpired ) {
            return parent::resetAction( $token, $request );
        }
        
        $params = [
            'user'  => $oUser,
            'token' => $token,
            
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        return $this->render( '@VSUsers/Resetting/change_password.html.twig', $params );
    }
}
