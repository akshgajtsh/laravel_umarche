<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\StoreRepositoryInterface;
use App\Http\Requests\StorePostRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class StoreService
{
    protected StoreRepositoryInterface $storeRepositoryInterface;

    public function __construct(StoreRepositoryInterface $storeRepositoryInterface)
    {
        $this->storeRepositoryInterface = $storeRepositoryInterface;
    }

    public function OwnerIndex(): LengthAwarePaginator
    {
        return $this->storeRepositoryInterface->OwnerIndex();
    }

    public function Ownerstore(StorePostRequest $request): void
    {
        $this->storeRepositoryInterface->OwnerStore($request);
    }

    public function OwnerDestroy($id)
    {
        $this->storeRepositoryInterface->OwnerDestroy($id);
    }
}
