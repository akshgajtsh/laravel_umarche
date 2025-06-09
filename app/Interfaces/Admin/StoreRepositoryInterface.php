<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\StorePostRequest;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Collection;

interface StoreRepositoryInterface
{
    public function OwnerIndex(): Collection;

    public function OwnerStore(StorePostRequest $request): Owner;

    public function OwnerDestroy($id);
}
