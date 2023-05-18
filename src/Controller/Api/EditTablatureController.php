<?php namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Repository\RepositoryInterface;

use App\Component\Uploader\TablatureUploader;
use App\Entity\Tablature;

class EditTablatureController extends AbstractController
{
    /** @var TokenStorageInterface */
    private $tokenStorage;
    
    /** @var ManagerRegistry */
    private $doctrine;
    
    /** @var RepositoryInterface */
    private $tablaturesRepository;
    
    /** @var TablatureUploader */
    private $uploader;
    
    public function __construct(
        TokenStorageInterface $tokenStorage,
        ManagerRegistry $doctrine,
        RepositoryInterface $tablaturesRepository,
        TablatureUploader $uploader
    ) {
        $this->tokenStorage         = $tokenStorage;
        $this->doctrine             = $doctrine;
        $this->tablaturesRepository = $tablaturesRepository;
        $this->uploader             = $uploader;
    }
    
    public function __invoke( $id, Request $request ): Tablature
    {
        $formData   = $this->getFormData( $request );
        $entity     = $this->tablaturesRepository->find( $id );
        
        if ( $formData['published'] !== null ) {
            $entity->setEnabled( filter_var( $formData['published'], FILTER_VALIDATE_BOOLEAN ) );
        }
        if ( $formData['artist'] !== null ) {
            $entity->setArtist( $formData['artist'] );
        }
        if ( $formData['song'] !== null ) {
            $entity->setSong( $formData['song'] );
        }
        
        $tabFile    = $request->files->get( 'tablature' );
        if ( $tabFile ) {
            $this->updateTablatureFile( $entity, $tabFile );
        }
        
        $em = $this->doctrine->getManager();
        $em->persist( $entity );
        $em->flush();
        
        return $entity;
    }
    
    private function getFormData( Request $request ): array
    {
        return [
            'published' => $request->request->get( 'published' ),
            'artist'    => $request->request->get( 'artist' ),
            'song'      => $request->request->get( 'song' ),
        ];
    }
    
    private function updateTablatureFile( Tablature &$tablature, File $file ): void
    {
        $tablatureFile  = $tablature->getTablatureFile();
        $tablatureFile->setOriginalName( $file->getClientOriginalName() );
        $tablatureFile->setTablature( $tablature );
        
        $uploadedFile   = new UploadedFile( $file->getRealPath(), $file->getBasename() );
        $tablatureFile->setFile( $uploadedFile );
        $this->uploader->upload( $tablatureFile );
        $tablatureFile->setFile( null ); // reset File Because: Serialization of 'Symfony\Component\HttpFoundation\File\UploadedFile' is not allowed
        
        if ( ! $tablature->getTablatureFile() ) {
            $tablature->setTablatureFile( $tablatureFile );
        }
    }
}
