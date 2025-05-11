<?php namespace App\Controller\WebGuitarPro;

use Vankosoft\UsersBundle\Controller\RegisterController as BaseRegisterController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Component\Context\ApplicationContextInterface;
use Vankosoft\UsersBundle\Security\UserManager;
use Vankosoft\UsersBundle\Security\AnotherLoginFormAuthenticator;

class RegisterController extends BaseRegisterController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        TranslatorInterface $translator,
        ApplicationContextInterface $applicationContext,
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
        parent::__construct(
            $doctrine,
            $translator,
            $applicationContext,
            $userManager,
            $usersRepository,
            $usersFactory,
            $userRolesRepository,
            $mailer,
            $pagesRepository,
            $guardHandler,
            $authenticator,
            $parameters
        );

        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCode );
    }
    
    public function index( Request $request, MailerInterface $mailer ): Response
    {
        if ( $this->getUser() ) {
            return $this->redirectToRoute( $this->params['defaultRedirect'] );
        }
        
        $form   = $this->getForm();
        $form->handleRequest( $request );
        if ( $form->isSubmitted() && $form->isValid() ) {
            //return parent::index( $request, $mailer );
            return $this->handleRegisterForm( $request, $mailer );
        }
        
        return $this->render( '@VSUsers/Register/register.html.twig', array_merge( [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ], $this->templateParams( $form ) ) );
    }
    
    protected function handleRegisterForm( Request $request, MailerInterface $mailer )
    {
        $form   = $this->getForm();
        $form->handleRequest( $request );
        if ( $form->isSubmitted() ) {
            $em             = $this->doctrine->getManager();
            $formUser       = $form->getData();
            $plainPassword  = $form->get( "plain_password" )->getData();
            $oUser          = $this->userManager->createUser(
                \strstr( $formUser->getEmail(), '@', true ),
                $formUser->getEmail(),
                $plainPassword
            );
            
            /** Prepare User */
            $this->prepareUser( $oUser, $form );
            
            /** Populate UserInfo Values */
            $this->populateUserInfo( $oUser, $form );
            
            $em->persist( $oUser );
            $em->flush();
            
            /*
            $pricingPlanId  = $form->get( "pricingPlan" )->getData();
            if ( $pricingPlanId ) {
                $pricingPlan    = $this->pricingPlanRepository->find( $pricingPlanId );
                $this->eventDispatcher->dispatch(
                    new CreateNewUserSubscriptionEvent( $oUser, $pricingPlan ),
                    CreateNewUserSubscriptionEvent::NAME
                );
            }
            */
            
            $this->sendConfirmationMail( $oUser, $mailer );
            
            $this->addFlash(
                'success',
                $this->translator->trans( 'vs_application.form.register.alert_success', [], 'VSApplicationBundle' )
            );
            
            return $this->redirectToRoute( $this->params['defaultRedirect'] );
        }
    }
    
    protected function prepareUser( &$oUser, $form )
    {
        $oUser->addRole( $this->userRolesRepository->findByTaxonCode( $this->params['registerRole'] ) );
        $oUser->addApplication( $this->applicationContext->getApplication() );
        
        $preferedLocale = $form->get( "prefered_locale" )->getData();
        $oUser->setPreferedLocale( $preferedLocale );
        $oUser->setVerified( false );
        $oUser->setEnabled( false );
    }
    
    protected function populateUserInfo( &$oUser, $form )
    {
        //$oUser->getInfo()->setTitle( $form->get( "title" )->getData() );
        $oUser->getInfo()->setFirstName( $form->get( "firstName" )->getData() );
        $oUser->getInfo()->setLastName( $form->get( "lastName" )->getData() );
        $oUser->getInfo()->setDesignation( $form->get( "designation" )->getData() );
    }
}
