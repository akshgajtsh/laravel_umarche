<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\StorePostRequest;
use App\Models\Owner;
use Illuminate\Pagination\LengthAwarePaginator;

interface StoreRepositoryInterface
{
    public function OwnerIndex(): LengthAwarePaginator;

    public function OwnerStore(StorePostRequest $request): Owner;

    public function OwnerEdit(string $id);

    public function OwnerUpdate(string $id, array $data);

    public function OwnerDestroy($id);
}
