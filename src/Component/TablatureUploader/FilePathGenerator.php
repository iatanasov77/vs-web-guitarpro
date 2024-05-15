<?php namespace App\Component\TablatureUploader;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use Vankosoft\CmsBundle\Component\Generator\FilePathGeneratorInterface;
use Vankosoft\CmsBundle\Model\Interfaces\FileInterface;

final class FilePathGenerator implements FilePathGeneratorInterface
{
    public function generate( FileInterface $file ): string
    {
        /** @var UploadedFile $uploadedfile */
        $uploadedfile   = $file->getFile();
        
        $hash   = bin2hex( random_bytes( 16 ) );

        return $this->expandPath( $hash . '.' . $uploadedfile->guessExtension() );
    }

    private function expandPath( string $path ): string
    {
        return sprintf( '%s/%s/%s', substr( $path, 0, 2 ), substr( $path, 2, 2 ), substr( $path, 4 ) );
    }
    
    private function _newFileName( $originalFileName )
    {
        $originalFilename   = pathinfo( $originalFileName, PATHINFO_FILENAME );
        $extension          = pathinfo( $originalFileName, PATHINFO_EXTENSION );
        
        // this is needed to safely include the file name as part of the URL
        $safeFilename       = transliterator_transliterate( 'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename );
        
        return $safeFilename . '-' . uniqid() . '.' . $extension;
    }
}
