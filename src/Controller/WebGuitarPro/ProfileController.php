<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Sylius\Component\Resource\Factory\FactoryInterface;

use Vankosoft\CmsBundle\Component\Uploader\FileUploaderInterface;
use Vankosoft\UsersBundle\Form\ProfileFormType;
use Vankosoft\UsersBundle\Form\ChangePasswordFormType;
use Vankosoft\UsersBundle\Model\UserInfoInterface;
use Vankosoft\UsersBundle\Security\UserManager;
use App\Entity\UsersSubscriptions\PayedService;

class ProfileController extends AbstractController
{
    /** @var UserManager */
    private UserManager $userManager;
    
    /** @var FactoryInterface */
    private $avatarImageFactory;
    
    /** @var FileUploaderInterface */
    private FileUploaderInterface $imageUploader;
    
    public function __construct(
        UserManager $userManager,
        FactoryInterface $avatarImageFactory,
        FileUploaderInterface $imageUploader
    ) {
        $this->userManager          = $userManager;
        $this->avatarImageFactory   = $avatarImageFactory;
        $this->imageUploader        = $imageUploader;
    }
    
    public function profilePictureAction( Request $request ): Response
    {
        $profilePicture = false;
        
        $userInfo   = $this->getUser()->getInfo();
        if ( $userInfo && $userInfo->getProfilePictureFilename() ) {
            $profilePictureFileName = 'uploads/profile_pictures/' . $userInfo->getProfilePictureFilename();
            if ( file_exists( $profilePictureFileName ) ) {
                $profilePicture = $profilePictureFileName;
            }
        }
        
        if ( ! $profilePicture ) {
            $profilePicture = '/build/default/images/avatar-1.jpg';
        }
        
        return new Response( $profilePicture, Response::HTTP_OK );
    }
    
    public function indexAction( Request $request ) : Response
    {
        $em             = $this->getDoctrine()->getManager();
        $oUser          = $this->getUser();
        $form           = $this->createForm( ProfileFormType::class, $oUser, [
            'data'      => $oUser,
            'action'    => $this->generateUrl( 'wgp_user_profile_show' ),
            'method'    => 'POST',
        ]);
        
        $otherForms     = $this->forms( $request, $oUser );
        
        $paidServicesRepo   = $this->getDoctrine()->getRepository( PayedService::class );
        $paidServices       = $paidServicesRepo->findAll();
        $paymentMethods     = [];
        
        $form->handleRequest( $request );
        if ( $form->isSubmitted() ) {
            $oUser          = $form->getData();
            
            if ( ! $oUser->getPreferedLocale() ) {
                $oUser->setPreferedLocale( $request->getLocale() );
            }
            
            $oUserInfo          = $oUser->getInfo();
            $profilePictureFile = $form->get( 'profilePicture' )->getData();
            if ( $profilePictureFile ) {
                $this->createAvatar( $oUserInfo, $profilePictureFile );
            }
            
            $oUserInfo->setFirstName( $form->get( 'firstName' )->getData() );
            $oUserInfo->setLastName( $form->get( 'lastName' )->getData() );
            
            $oUserInfo->setUser( $oUser );
            $em->persist( $oUserInfo );
            $em->persist( $oUser );
            $em->flush();
            
            return $this->redirectToRoute( 'vs_users_profile_show' );
        }
        
        return $this->render( 'Pages/Profile/show.html.twig', [
            'errors'            => $form->getErrors( true, false ),
            'form'              => $form->createView(),
            'user'              => $oUser,
            'otherForms'        => $otherForms,
            'paidServices'      => $paidServices,
            'paymentMethods'    => $paymentMethods,
        ]);
    }
    
    public function changePasswordAction( Request $request ) : Response
    {
        $em         = $this->getDoctrine()->getManager();
        $oUser      = $this->getUser();
        $forms      = $this->forms( $request, $oUser );
        $f          = $forms['changePasswordForm'];
        
        $f->handleRequest( $request );
        if ( $f->isSubmitted() && $f->isValid() ) {
            $data           = $request->request->all();

            $oldPassword        = $data['change_password_form']['oldPassword'];
            $newPassword        = $data['change_password_form']['password']['first'];
            $newPasswordConfirm = $data['change_password_form']['password']['second'];
            
            if ( ! $this->userManager->isPasswordValid( $oUser, $oldPassword ) ) {
                throw new \Exception( 'Invalid Old Password !!!' );
            }
            
            if ( $newPassword !== $newPasswordConfirm ) {
                throw new \Exception( 'Passwords Not Equals !!!' );
            }
            
            $this->userManager->encodePassword( $oUser, $newPassword );
            $em->persist( $oUser );
            $em->flush();
        }
        
        return $this->redirectToRoute( 'vs_users_profile_show' );
    }
    
    protected function forms( Request $request, $oUser ) : array
    {
        $changePasswordForm = $this->createForm( ChangePasswordFormType::class, $oUser, [
            'data'      => $oUser,
            'action'    => $this->generateUrl( 'wgp_user_profile_change_password' ),
            'method'    => 'POST',
        ]);
        
        return [
            'changePasswordForm'    => $changePasswordForm,
        ];
    }
    
    private function createAvatar( UserInfoInterface &$userInfo, File $file ): void
    {
        $avatarImage    = $userInfo->getAvatar() ?: $this->avatarImageFactory->createNew();
        $uploadedFile   = new UploadedFile( $file->getRealPath(), $file->getBasename() );
        
        $avatarImage->setFile( $uploadedFile );
        $this->imageUploader->upload( $avatarImage );
        $avatarImage->setFile( null ); // reset File Because: Serialization of 'Symfony\Component\HttpFoundation\File\UploadedFile' is not allowed
        
        if ( ! $userInfo->getAvatar() ) {
            $userInfo->setAvatar( $avatarImage );
        }
    }
}
