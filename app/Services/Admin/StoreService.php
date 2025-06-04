<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\StoreRepositoryInterface;
use App\Http\Requests\StorePostRequest;

class StoreService
{
    protected StoreRepositoryInterface $storeRepositoryInterface;

    public function __construct(StoreRepositoryInterface $storeRepositoryInterface)
    {
        $this->storeRepositoryInterface = $storeRepositoryInterface;
    }

    public function Ownerstore(StorePostRequest $request): void
    {
        $this->storeRepositoryInterface->OwnerStore($request);
    }
}
