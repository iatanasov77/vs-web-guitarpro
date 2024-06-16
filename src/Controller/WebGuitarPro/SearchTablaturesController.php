<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Knp\Component\Pager\PaginatorInterface;

class SearchTablaturesController extends AbstractController
{
    use GlobalFormsTrait;
    
    /** @var int */
    protected $tabsPerPage  = 10;
    
    /** @var EntityRepository */
    protected $tablaturesRepository;
    
    public function __construct(
        EntityRepository $tablaturesRepository
    ) {
        $this->tablaturesRepository = $tablaturesRepository;
    }
    
    public function index( Request $request, PaginatorInterface $paginator ): Response
    {
        $criteria   = $formPost   = $request->request->get( 'searchCriteria' );
        $queryBuilder   = $this->tablaturesRepository->searchTablatures( $criteria, $this->getAppUser() );
        $resources      = $paginator->paginate(
            $queryBuilder,
            $request->query->getInt( 'page', 1 ) /*page number*/,
            $this->tabsPerPage /*limit per page*/
        );
        
        $params = [
            'tabForm'           => $this->getTabForm()->createView(),
            'tabCategoryForm'   => $this->getTabCategoryForm()->createView(),
            'tabs'              => $resources,
            'searchCriteria'    => $criteria,
        ];
        
        return $this->render( 'Pages/Dashboard/search-tablatures.html.twig', $params );
    }
}
