<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\StoreRepositoryInterface;
use App\Models\Owner;
use App\Http\Requests\StorePostRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;


class StoreRepository implements StoreRepositoryInterface
{
    public function OwnerIndex(): Collection
    {
        return Owner::select('id', 'name', 'email', 'created_at')->get();
    }
    //オーナー登録 
    public function OwnerStore(StorePostRequest $request): Owner
    {
        return Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function OwnerDestroy($id){
        Owner::findOrFail($id)->delete(); //ソフトデリート 
    }
}
