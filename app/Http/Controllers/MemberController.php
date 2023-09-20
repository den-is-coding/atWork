<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Resources\MemberResource;
use Symfony\Component\HttpFoundation\Response;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MemberResource::collection(Member::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this -> validate($request, [
            'name'=>'min:3 | max: 40',
            'surname'=>'min:3 | max:40',
            'avatar'=>'required|image|mimes:png,jpg|max:2048',
            'phone_number'=>'required|string|digits:10'
        ]);

        $member_name = $request->input('name');
        $member_surname = $request->input('surname');
        $member_phone_number = $request->input('phone_number');
        $member_avatar = $request->file('avatar')->store('avatar', 'public');

        $member = Member::create([
            'name'=>$member_name,
            'surname'=>$member_surname,
            'avatar'=>$member_avatar,
            'phone_number'=>"+7".$member_phone_number
        ]);

        $member->save();
        return response($member, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return new MemberResource($member);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {

        $this -> validate($request, [
            'name'=>'min:3 | max: 40',
            'surname'=>'min:3 | max:40',
            'avatar'=>'required|image|mimes:png,jpg|max:2048',
            'phone_number'=>'required|string|digits:10'
        ]);

        $member_name = $request->input('name');
        $member_surname = $request->input('surname');
        $member_phone_number = $request->input('phone_number');
        $member_avatar = $request->file('avatar')->store('avatar', 'public');

        $member ->update([
            'name'=>$member_name,
            'surname'=>$member_surname,
            'avatar'=>$member_avatar,
            'phone_number'=>"+7".$member_phone_number
        ]);

        return response()->json([
            'data' => new MemberResource($member),
            200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company ->delete();
        return response()->json(null, 204);
    }
}
