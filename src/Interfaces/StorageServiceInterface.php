<?php

namespace Vaffel\Tuski\Interfaces;

interface StorageServiceInterface
{
    public function storeFileChunk($resourceId, $offset, $length);

    public function getFileChunk($resourceId, $offset, $length);

    public function getFileChunks($resourceId);

    public function deleteFileChunks($resourceId);
}