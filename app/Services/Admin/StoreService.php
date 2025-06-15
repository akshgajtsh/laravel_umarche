<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\StoreRepositoryInterface;
use App\Http\Requests\StorePostRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        try {
            DB::beginTransaction();
            $this->storeRepositoryInterface->OwnerStore($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
        }
    }

    public function OwnerDestroy($id)
    {
        $this->storeRepositoryInterface->OwnerDestroy($id);
    }
}
