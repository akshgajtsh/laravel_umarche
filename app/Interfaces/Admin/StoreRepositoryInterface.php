<?php

namespace App\Interfaces\Admin;

use App\Http\Requests\StorePostRequest;
use App\Models\Owner;

interface StoreRepositoryInterface
{
    public function OwnerStore(StorePostRequest $request): Owner;
}
