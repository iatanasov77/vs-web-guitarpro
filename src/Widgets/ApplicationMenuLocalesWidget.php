<?php namespace App\Widgets;

use Vankosoft\ApplicationBundle\EventListener\Widgets\WidgetLoaderInterface;
use Vankosoft\ApplicationBundle\Component\Widget\Widget;
use Vankosoft\ApplicationBundle\Component\Widget\Builder\Item;
use Vankosoft\ApplicationBundle\EventListener\Event\WidgetEvent;

use Symfony\Component\HttpFoundation\RequestStack;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class ApplicationMenuLocalesWidget implements WidgetLoaderInterface
{
    /** @var RequestStack */
    private $requestStack;
    
    /** @var RepositoryInterface */
    private $localesRepository;
    
    public function __construct(
        RequestStack $requestStack,
        RepositoryInterface $localesRepository
    ) {
        $this->requestStack         = $requestStack;
        $this->localesRepository    = $localesRepository;
    }
    
    public function builder( WidgetEvent $event )
    {
        $request    = $this->requestStack->getMainRequest();
        //$request    = $this->requestStack->getCurrentRequest();
        
        $currentLocale      = $request->getLocale();
        $availableLocales   = $this->localesRepository->findAll();
        
        /** @var Widget */
        $widgetContainer    = $event->getWidgetContainer();
        
        /** @var Item */
        $widgetItem = $widgetContainer->createWidgetItem( 'application-menu-locales', false );
        if( $widgetItem ) {
            $widgetItem->setTemplate( 'Widgets/application_menu_locales.html.twig', [
                'currentLocale'     => $currentLocale,
                'availableLocales'  => $availableLocales,
            ]);
            
            // Add Widgets
            $widgetContainer->addWidget( $widgetItem );
        }
    }
}