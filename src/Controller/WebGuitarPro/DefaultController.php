<?php namespace App\Controller\WebGuitarPro;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\Application\DefaultController as BaseDefaultController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Twig\Environment;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Component\Context\ApplicationContextInterface;
use Vankosoft\ApplicationBundle\Model\Interfaces\TaxonomyInterface;

class DefaultController extends BaseDefaultController // AbstractController
{
    use GlobalFormsTrait;
    
    /** @var ManagerRegistry **/
    private $doctrine;
    
    /** @var ApplicationContextInterface */
    private $applicationContext;
    
    /** @var Environment */
    private $templatingEngine;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        ApplicationContextInterface $applicationContext,
        Environment $templatingEngine,
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        $this->doctrine                 = $doctrine;
        $this->applicationContext       = $applicationContext;
        $this->templatingEngine         = $templatingEngine;
        
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
    }
    
    public function index( Request $request ): Response
    {
        //$this->get( 'session' )->remove( 'vs_payment_basket_id' );
        //var_dump( $this->getUser()->getTabCategories()->count() ); die;
        
        $er     = $this->doctrine->getRepository( 'App\Entity\Tablature' );        
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            // About enabled field - $enabled (public)
            'tabs'                          => $er->findBy( ['enabled' => true], [ 'updatedAt' => 'DESC' ], 10 ),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        //var_dump( $params ); die;
        
        return new Response( $this->templatingEngine->render( $this->getTemplate(), $params ) );
    }
    
    protected function getTemplate(): string
    {
        $template   = 'web-guitar-pro/Pages/Dashboard/index.html.twig';
        
        $appSettings    = $this->applicationContext->getApplication()->getSettings();
        if ( ! $appSettings->isEmpty() && $appSettings[0]->getTheme() ) {
            $template   = 'Pages/Dashboard/index.html.twig';
        }
        
        return $template;
    }
}
