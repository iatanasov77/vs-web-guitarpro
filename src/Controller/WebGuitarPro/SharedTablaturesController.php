<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\FormInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Vankosoft\ApplicationBundle\Component\Status;

use App\Form\EditShareForm;
use App\Entity\TablatureShare;

class SharedTablaturesController extends AbstractController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    /** @var ManagerRegistry */
    protected ManagerRegistry $doctrine;
    
    /** @var EntityRepository */
    protected $tablatureCategoriesRepository;
    
    /** @var EntityRepository */
    protected $tablaturesRepository;
    
    public function __construct(
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCode,
        ManagerRegistry $doctrine,
        EntityRepository $tablatureCategoriesRepository,
        EntityRepository $tablaturesRepository
    ) {
        $this->tabCategoriesTaxonomy            = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCode );
        $this->doctrine                         = $doctrine;
        $this->tablatureCategoriesRepository    = $tablatureCategoriesRepository;
        $this->tablaturesRepository             = $tablaturesRepository;
    }
    
    public function index( Request $request ): Response
    {
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->getDoctrine()->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->getDoctrine()->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        
        return $this->render( 'Pages/SharedTablatures/index.html.twig', $params );
    }
    
    public function myShares( Request $request ): Response
    {
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->getDoctrine()->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->getDoctrine()->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        
        return $this->render( 'Pages/SharedTablatures/my_shares.html.twig', $params );
    }
    
    public function getEditShareFormAction( $shareId, Request $request ): Response
    {
        $oShare = $this->doctrine->getRepository( TablatureShare::class )->find( $shareId );
        $params = [
            'form'      => $this->getForm( $oShare )->createView(),
            'oShare'    => $oShare,
        ];
        
        return $this->render( 'Partial/edit-share-form.html.twig', $params );
    }
    
    public function handleEditShareFormAction( Request $request ): Response
    {
        $em     = $this->doctrine->getManager();
        $form   = $this->getForm();
        
        $form->handleRequest( $request );
        if ( $form->isSubmitted() ) {
            $oShare = $form->getData();
            
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
    
    public function easyuiTablaturesData()
    {
        $tabCategories      = $this->tablatureCategoriesRepository->findBy( ['user' =>$this->getUser()] );
        $userTabs           = $this->tablaturesRepository->findBy( ['user' =>$this->getUser()] );
        
        $easyuiTablatures    = [];
        $key = 0;
        foreach ( $tabCategories as $cat ) {
            $easyuiTablatures[$key]   = [
                'id'        => $cat->getId(),
                'text'      => $cat->getName(),
                'children'  => [],
            ];
            
            foreach ( $cat->getTablatures() as $tab ) {
                $easyuiTablatures[$key]['children'][]   = [
                    'id'        => $tab->getId(),
                    'text'      => $tab->getArtist() . ' - ' . $tab->getSong(),
                ];
            }
            
            $key++;
        }
        
        $easyuiTablatures[$key]   = [
            'id'        => 'uncategorized',
            'text'      => 'Uncategorized',
            'children'  => [],
        ];
        
        foreach( $userTabs as $tab ) {
            if( $tab->getCategories()->isEmpty() )
            {
                $easyuiTablatures[$key]['children'][]   = [
                    'id'        => $tab->getId(),
                    'text'      => $tab->getArtist() . ' - ' . $tab->getSong(),
                ];
            }
        }
        
        return new JsonResponse( $easyuiTablatures );
    }
    
    private function getForm( ?TablatureShare $oShare = null ): FormInterface
    {
        if ( ! $oShare ) {
            $oShare = $this->doctrine->getRepository( TablatureShare::class )->find( $_POST['edit_share_form']['id'] );
        }
        
        return $this->createForm( EditShareForm::class, $oShare );
    }
}
