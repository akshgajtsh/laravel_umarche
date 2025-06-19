<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\StoreRepositoryInterface;
use App\Models\Owner;
use App\Http\Requests\StorePostRequest;
use App\Models\Shop;
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
        $owner = Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Shop::create([
            'owner_id' => $owner->id,
            'name' => '店名',
            'information' => '情報',
            'filename' => '',
            'is_selling' => true
        ]);

        return $owner;
    }

    public function OwnerEdit(string $id)
    {
        return Owner::findOrFail($id);
    }

    public function OwnerUpdate(string $id, array $data)
    {
        return Owner::findOrFail($id)->update($data);
    }

    public function OwnerDestroy($id)
    {
        Owner::findOrFail($id)->delete(); //ソフトデリート 
    }
}
