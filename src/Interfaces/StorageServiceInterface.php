<?php

namespace Vaffel\Tuski\Interfaces;

interface StorageServiceInterface
{
    public function storeChunk($resourceId, $offset, $length);

    public function getChunk($resourceId, $offset, $length);

    public function getChunks($resourceId);

    public function deleteChunks($resourceId);
}