<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\StoreRepositoryInterface;
use App\Models\Owner;
use App\Http\Requests\StorePostRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;


class StoreRepository implements StoreRepositoryInterface
{
    public function OwnerIndex(): LengthAwarePaginator
    {
        return Owner::select('id', 'name', 'email', 'created_at')->paginate(3);
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
