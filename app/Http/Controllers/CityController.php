<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City as City;

use Illuminate\Support\Facades\Validator as FacadesValidator;

class CityController extends ApiController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $cities = City::paginate();
        return $this->successResponse($cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $validator = $this->validateCity();

        if($validator->fails()){
            return $this->errorResponse($validator->getMessageBag(), 422);
        }
        	
        $city = City::Create(['city_name' => $request->get('city_name'), 'country_name' => $request->get('country_name') ]);

        return $this->successResponse($city, null, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   echo $id;
        //
        $cities = City::find($id);
        return $this->successResponse($cities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }



    public function validateCity()
    {
        return FacadesValidator::make(request()->all(), ['country_name' => 'required|string|max:255', 
                                                         'city_name' => 'required|string|max:255|unique:cities',
                                                        ]);
    }
}
