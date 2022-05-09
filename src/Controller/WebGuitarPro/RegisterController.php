<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use SymfonyCasts\Bundle\VerifyEmail\Generator\VerifyEmailTokenGenerator;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

use Vankosoft\UsersBundle\Security\UserManager;
use Vankosoft\UsersBundle\Model\UserInterface;
use App\Form\RegistrationForm;
use App\Entity\UserManagement\User;

class RegisterController extends AbstractController
{
    /**
     * @var UserManager
     */
    private $userManager;
    
    /**
     * @var RepositoryInterface
     */
    private $usersRepository;
    
    
    private $userRolesRepository;
    
    /**
     * @var MailerInterface
     */
    private $mailer;
    
    /**
     * @var VerifyEmailHelperInterface
     */
    private $verifyEmailHelper;
    
    /**
     * Needed to generate Api Token
     * 
     * @var VerifyEmailHelperInterface
     */
    private $tokenGenerator;
    
    public function __construct(
        UserManager $userManager,
        RepositoryInterface $usersRepository,
        RepositoryInterface $userRolesRepository,
        MailerInterface $mailer
    ) {
        $this->userManager          = $userManager;
        $this->usersRepository      = $usersRepository;
        $this->userRolesRepository  = $userRolesRepository;
        $this->mailer               = $mailer;
    }

    public function setTokenGenerator( VerifyEmailTokenGenerator $tokenGenerator ) : void
    {
        $this->tokenGenerator   = $tokenGenerator;
    }
    
    public function setVerifyEmailHelper( VerifyEmailHelperInterface $helper ) : void
    {
        $this->verifyEmailHelper    = $helper;
    }
    
    public function index( Request $request  ) : Response
    {
        $form       = $this->createForm( RegistrationForm::class, new User(), [
            'action'    => $this->generateUrl( 'wgp_user_registration_form' ),
        ]);
        
        $form->handleRequest( $request );
        if ( $form->isSubmitted() ) {
            $formUser       = $form->getData();
            $plainPassword  = $form->get( "plain_password" )->getData();
            $user           = $this->userManager->createUser(
                $formUser->getUsername(),
                $formUser->getEmail(),
                $plainPassword
            );
            
            // Set Role: ROLE_WEB_CONTENT_THIEF_ADMIN
            $user->addRole( $this->userRolesRepository->findByTaxonCode( 'role-web-content-thief-admin' ) );
            $user->setPreferedLocale( $request->getLocale() );
            $user->setVerified( false );
            $user->setEnabled( false );
            
            $this->userManager->saveUser( $user );
            $this->sendConfirmationMail( $user );
            
            return $this->redirectToRoute( 'app_login' );
        }
        
        return $this->render( 'Pages/Register/register.html.twig', [
            'errors' => $form->getErrors( true, false ),
            'form'  => $form->createView(),
        ]);
    }
    
    public function verify( Request $request ): Response
    {
//         $this->denyAccessUnlessGranted( 'IS_AUTHENTICATED_FULLY' );
//         $user = $this->getUser();
        $id = $request->get( 'id' ); // retrieve the user id from the url
        // Verify the user id exists and is not null
        if( null === $id ) {
            return $this->redirectToRoute( 'app_login' );
        }

        $user = $this->usersRepository->find( $id );

        // Ensure the user exists in persistence
        if ( null === $user ) {
            return $this->redirectToRoute( 'wgp_user_registration_form' );
        }
                
        try {
            $this->verifyEmailHelper->validateEmailConfirmation( $request->getUri(), $user->getId(), $user->getEmail() );
        } catch ( VerifyEmailExceptionInterface $e ) {
            $this->addFlash( 'verify_email_error', $e->getReason() );
            
            return $this->redirectToRoute( 'wgp_user_registration_form' );
        }
        
        $em = $this->getDoctrine()->getManager();
        
        // Mark your user as verified.
        $user->setVerified( true );
        $user->setEnabled( true );
        
        $em->persist( $user );
        $em->flush();
        
        $this->addFlash( 'success', 'Your e-mail address has been verified.' );
        
        return $this->redirectToRoute( 'app_login' );
    }
    
    private function sendConfirmationMail( UserInterface $user )
    {
        $signatureComponents = $this->verifyEmailHelper->generateSignature(
                                    'wgp_user_registration_confirmation',
                                    $user->getId(),
                                    $user->getEmail(),
                                    ['id' => $user->getId()]
                                );
        
        $email = ( new TemplatedEmail() )
                ->from( 'webmaster@vankosoft.org' )
                ->to( $user->getEmail() )
                ->htmlTemplate( 'Pages/Register/confirmation_email.html.twig' )
                ->context([
                    'signedUrl'             => $signatureComponents->getSignedUrl(),
                    'expiresAtMessageKey'   => $signatureComponents->getExpirationMessageKey(),
                    'expiresAtMessageData'  => $signatureComponents->getExpirationMessageData(),
                ]);
        
        $this->mailer->send( $email );
    }
}
