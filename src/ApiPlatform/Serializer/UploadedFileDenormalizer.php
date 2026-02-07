<?php namespace App\ApiPlatform\Serializer;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class UploadedFileDenormalizer implements DenormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function denormalize( $data, string $type, string $format = null, array $context = [] ): UploadedFile
    {
        return $data;
    }
    
    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization( mixed $data, string $type, ?string $format = null, array $context = [] ): bool
    {
        return $data instanceof UploadedFile;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getSupportedTypes( ?string $format ): array
    {
        return self::FORMAT === $format ? ['object' => true] : [];
    }
}
