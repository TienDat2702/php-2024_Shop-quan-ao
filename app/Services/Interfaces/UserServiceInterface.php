<?php

namespace App\Services\Interfaces;

/**
 * Interface UserserviceInterface
 * @package App\Services\Interfaces
 */
interface UserserviceInterface
{
    public function paginate($request);
    public function create($request);
    public function update(int $id, $request);
    public function destroy(int $id);
    public function updateStatus(int $id) ;
}
