<?php

namespace App\Services\Interfaces;

/**
 * Interface UserCatalogueServiceInterface
 * @package App\Services\Interfaces
 */
interface UserCatalogueServiceInterface
{
    public function paginate($request);
    public function create($request);
    public function update(int $id, $request);
    public function destroy(int $id);
    public function updateStatus(int $id) ;
    public function updateStatusAll($post);
}
