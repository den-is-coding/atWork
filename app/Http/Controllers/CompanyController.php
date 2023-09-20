<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;
use App\Models\Company;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CompanyResource::collection(Company::all());
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
            'title'=>'min:3 | max: 40',
            'description'=>'min:150 | max:400',
            'logo'=>'required|image|mimes:png|max:3072',
        ]);


        $company_title = $request->input('title');
        $company_description = $request->input('description');
        $company_logo = $request->file('logo')->store('image', 'public');

        $company = Company::create([
            'title'=>$company_title,
            'description'=>$company_description,
            'logo'=>$company_logo,
        ]);
        return response($company, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
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
    public function update(Request $request, Company $company)
    {

        $this -> validate($request, [
            'title'=>'min:3 | max: 40',
            'description'=>'min:150 | max:400',
            'logo'=>'required|image|mimes:png|max:3072',
        ]);

        $company_title = $request->input('title');
        $company_description = $request->input('description');
        $company_logo = $request->input('logo');

        $company -> update([
            'title' => $company_title,
            'description' => $company_description,
            'logo' => $company_logo
        ]);

        return response()->json([
            'data' => new CompanyResource($company),
            200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company -> delete();
        return response() -> json(null, 204);
    }
}
