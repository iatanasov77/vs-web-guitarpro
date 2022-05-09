<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use SymfonyCasts\Bundle\ResetPassword\Controller\ResetPasswordControllerTrait;
use SymfonyCasts\Bundle\ResetPassword\ResetPasswordHelperInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

use Vankosoft\UsersBundle\Model\UserInterface;
use Vankosoft\UsersBundle\Repository\ResetPasswordRequestRepository;

class ForgotPasswordController extends AbstractController
{
    use ResetPasswordControllerTrait;
    
    /**
     * @var ResetPasswordHelperInterface
     */
    private $resetPasswordHelper;
    
    /**
     * @var ResetPasswordRequestRepository
     */
    private $repository;
    
    /**
     * @var RepositoryInterface
     */
    private $usersRepository;
    
    /**
     * @var MailerInterface
     */
    private $mailer;
    
    public function __construct(
        ResetPasswordRequestRepository $repository,
        RepositoryInterface $usersRepository,
        MailerInterface $mailer
    ) {
        $this->repository           = $repository;
        $this->usersRepository      = $usersRepository;
        $this->mailer               = $mailer;
    }
    
    public function setResetPasswordHelper( ResetPasswordHelperInterface $helper ) : void
    {
        $this->resetPasswordHelper  = $helper;
    }
    
    public function indexAction( Request $request ) : Response
    {
        if ( $request->isMethod( 'POST' ) ) {
            $email  = $request->request->get( 'email' );
            $user   = $this->usersRepository->findOneBy( ['email' => $email] );
            if ( ! $user ) {
                $this->addFlash( 'error', 'This email not found !' );
                return $this->redirectToRoute( 'app_login' );
            }

            $this->addFlash( 'notice', 'Email sent with link to reset your password !' );
            $this->sendMail( $user );
            
            return $this->redirectToRoute( 'app_login' );
        }
        
        return $this->render( 'Pages/ForgotPassword/forgot_password.html.twig' );
    }
    
    public function resetAction( string $token, Request $request ) : Response
    {
        $this->repository->setContainer( $this->container );
        $oUser   = $this->resetPasswordHelper->validateTokenAndFetchUser( $token );
        
        if ( $request->isMethod( 'POST' ) ) {
            $userManager    = $this->container->get( 'vs_users.manager.user' );
            
            $password           = $request->request->get( 'password' );
            $passwordConfirm    = $request->request->get( 'password_confirm' );
            if ( $password === $passwordConfirm ) {
                $em = $this->getDoctrine()->getManager();
                
                $userManager->encodePassword( $oUser, $password );
                $em->persist( $oUser );
                $em->flush();
                
                $this->resetPasswordHelper->removeResetRequest( $token );
                
                return $this->redirectToRoute( 'app_login' ); // Success change password ;)
            }
        }
        
        return $this->render( 'Pages/ForgotPassword/change_password.html.twig', [
            'user'  => $oUser,
            'token' => $token,
        ]);
    }
    
    private function sendMail( UserInterface $oUser )
    {
        $this->repository->setContainer( $this->container );
        
        $resetToken = $this->resetPasswordHelper->generateResetToken( $oUser );
        $resetUrl   = $this->generateUrl(
                        'wgp_user_forgot_password_reset',
                        [token => $resetToken->getToken()],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    );
        
        $email = ( new TemplatedEmail() )
                    ->from( 'webmaster@vankosoft.org' )
                    ->to( $oUser->getEmail() )
                    ->htmlTemplate( 'Pages/ForgotPassword/forgot_password_email.html.twig' )
                    ->context([
                        'resetUrl'  => $resetUrl,
                        'expiresAt' => $resetToken->getExpiresAt()->format( 'Y-m-d H:i:s' )
                    ]);
        
        //var_dump( $email->getHtmlBody() ); die;
        $this->mailer->send( $email );
    }
}
