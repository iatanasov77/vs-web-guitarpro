<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\FormInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Vankosoft\UsersBundle\Repository\UsersRepository;
use Vankosoft\ApplicationBundle\Component\Status;

use App\Form\ShareTablatureForm;
use App\Entity\TablatureShare;
use App\Entity\Tablature;

class ShareTablatureController extends AbstractController
{
    /** @var UsersRepository */
    protected UsersRepository $usersRepository;
    
    /** @var EntityRepository */
    protected EntityRepository $tabsRepository;
    
    /** @var ManagerRegistry */
    protected ManagerRegistry $doctrine;
    
    public function __construct(
        UsersRepository $usersRepository,
        EntityRepository $tabsRepository,
        ManagerRegistry $doctrine
    ) {
        $this->usersRepository  = $usersRepository;
        $this->tabsRepository   = $tabsRepository;
        $this->doctrine         = $doctrine;
    }
    
    public function getFormAction( $tabId, Request $request ): Response
    {
        $params = [
            'form'  => $this->getForm()->createView(),
            'tabId' => $tabId,
        ];
        
        return $this->render( 'Partial/share-tablature-form.html.twig', $params );
    }
    
    public function jqueryuiAvailableShares( Request $request ): Response
    {
        $shares             = $this->doctrine->getRepository( TablatureShare::class )->findBy( ['owner' => $this->getUser()] );
        
        $availableShares    = [];
        foreach ( $shares as $share ) {
            $availableShares[$share->geId()]  = $share->getName();
        }
        
        return new  JsonResponse( $availableShares );
    }
    
    public function easyuiTargetUsersData( Request $request ): Response
    {
        $users  = $this->usersRepository->findAll();
        
        $easyuiUsers    = [];
        foreach ( $users as $user ) {
            if ( $user->getId() == $this->getUser()->getId() ) {
                continue;
            }
                
            $easyuiUsers[]  = [
                "id"    => $user->getId(),
                "text"  => $user->getEmail(),
            ];
        }
        
        return new JsonResponse( $easyuiUsers );
    }
    
    public function handleFormAction( Request $request ): Response
    {
        $em     = $this->doctrine->getManager();
        $form   = $this->getForm();
        
        $form->handleRequest( $request );
        if ( $form->isSubmitted() ) {
            $tablatureId    = (int)$form->get( 'tablatureId' )->getData();
            $targetUsers    = $form->get( 'targetUsers' )->getData();
            $shareId        = (int)$form->get( 'shareId' )->getData();
            
            if ( $shareId ) {
                $oShare = $this->doctrine->getRepository( TablatureShare::class )->find( $shareId );
            } else {
                $shareName  = $form->get( 'name' )->getData();
                $oShare     = new TablatureShare();
                
                $oShare->setOwner( $this->getUser() );
                $oShare->setName( $shareName );
            }
            
            $oShare->setTargetUsers( $targetUsers );
            $oShare->addTablature( $this->doctrine->getRepository( Tablature::class )->find( $tablatureId ) );
            
            $em->persist( $oShare );
            $em->flush();
            
            return new JsonResponse([
                'status'   => Status::STATUS_OK
            ]);
        }
        
        return new JsonResponse([
            'status'   => Status::STATUS_ERROR
        ]);
    }
    
    private function getForm(): FormInterface
    {
        return $this->createForm( ShareTablatureForm::class );
    }
}
