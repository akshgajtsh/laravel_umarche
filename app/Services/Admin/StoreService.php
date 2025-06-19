<?php

namespace App\Services\Admin;

use App\Interfaces\Admin\StoreRepositoryInterface;
use App\Http\Requests\StorePostRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function OwnerEdit(string $id)
    {
        return $this->storeRepositoryInterface->OwnerEdit($id);
    }

    public function OwnerUpdate(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $this->storeRepositoryInterface->OwnerUpdate($id, $data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }
    }

    public function OwnerDestroy($id)
    {
        $this->storeRepositoryInterface->OwnerDestroy($id);
    }
}
