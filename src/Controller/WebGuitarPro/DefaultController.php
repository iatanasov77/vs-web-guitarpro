<?php namespace App\Controller\WebGuitarPro;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Component\Context\ApplicationContextInterface;
use Vankosoft\ApplicationBundle\Model\Interfaces\TaxonomyInterface;

use App\Entity\Tablature;
use App\Form\TablatureForm;

class DefaultController extends Controller
{
    /** @var ApplicationContextInterface */
    private $applicationContext;
    
    /** @var Environment */
    private $templatingEngine;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ApplicationContextInterface $applicationContext,
        Environment $templatingEngine,
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        $this->applicationContext       = $applicationContext;
        $this->templatingEngine         = $templatingEngine;
        
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
    }
    
    public function index( Request $request ): Response
    {
        $er         = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        
        $params = [
            'tabForm'                   => $this->getTabForm()->createView(),
            'tabCategoryForm'           => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'   => $this->tabCategoriesTaxonomy->getId(),
            'tabs'                      => $er->findAll()
        ];
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
