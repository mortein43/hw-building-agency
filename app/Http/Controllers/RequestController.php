<?php

namespace App\Http\Controllers;

use App\Exceptions\FormException;
use App\Models\Complex;
use App\Models\Flat;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = \App\Models\Request::where('email', auth()->user()->email)->get();
        return view('show-request')->with('requests',$requests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'complexes' => Complex::all(),
            'types' => Type::all()
        ];
        return view('form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
             'first_name' => ['string', 'max:255'],
             'last_name' => ['string', 'max:255'],
             'phone_number' => ['string', 'max:255'],
             'email' => ['string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
             'complex' =>['string', 'max:255'],
             'type' =>['string', 'max:255'],
             'area' =>['required'],
             'budget' =>['required'],
         ]);

         $user = auth()->user();

         if (isset($data['first_name']) && !empty($data['first_name'])) {
             $first_name = $data['first_name'];
         } else {
             $first_name = $user->first_name;
         }

         if (isset($data['last_name']) && !empty($data['last_name'])) {
             $last_name = $data['last_name'];
         } else {
             $last_name = $user->last_name;
         }

         if (isset($data['phone_number']) && !empty($data['phone_number'])) {
             $phone_number = $data['phone_number'];
         } else {
             $phone_number = $user->phone_number;
         }

         if (isset($data['email']) && !empty($data['email'])) {
             $email= $data['email'];
         } else {
             $email = $user->email;
         }

        try {
            $complexId = $data['complex'];
            $typeId = $data['type'];
            $complex = Complex::findOrFail($complexId);
            $type = Type::findOrFail($typeId);

            $request = new \App\Models\Request();
            $request->first_name = $first_name;
            $request->last_name = $last_name;
            $request->phone_number = $phone_number;
            $request->email = $email;
            $request->complex_id = $complex->id;
            $request->type_id = $type->id;
            $request->area = $data['area'];
            $request->budget = $data['budget'];

            $request->save();


            $flats = Flat::where('complex_id', $complex->id)
                ->where('type_id', $type->id)
                ->get();

            if ($flats->isNotEmpty()) {
                return view('form')->with([
                    'flats' => $flats,
                    'complexes' => Complex::all(),
                    'types' => Type::all()
                ]);
            } else {
                return view('form')->with([
                    'message'=>'not found',
                    'complexes' => Complex::all(),
                    'types' => Type::all()
                ]);
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            throw new FormException("Record not found");
        }

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show( \App\Models\Request $requests)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Request $request)
    {
        return view('edit-request', ['request' => $request]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Request $requestModel)
    {
        $data = $request->validate([
            'complex_id' =>['required', 'integer', 'exists:complexes,id'],
            'type_id' =>['required', 'integer', 'exists:types,id'],
            'area' =>['required'],
            'budget' =>['required'],
        ]);


            $requestModel->update([
            'complex_id' => $data['complex_id'],
            'type_id' => $data['type_id'],
            'area' => $data['area'],
            'budget' => $data['budget'],
            ]);


        return redirect()->route('requests.show');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Request $requestModel)
    {
        $requestModel->delete();
        return redirect()->route('requests.show');
    }
}
