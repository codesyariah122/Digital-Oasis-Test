<?php
// Teknikal Test Digital Oasis 2022
// File: app/BaseClass
/*
created by :
    nama : Puji Ermanto
    email : pujiermanto@gmail.com
    no telp : 0882 2266 8778
    github username : codesyariah122
*/
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::latest()->paginate(10);
        try{
            return response()->json([
                'success'=>true,
                'message'=>'Fetch employee data!',
                'data' => $employees
            ],201);
        }catch(Exception $e){
            return response()->json([
                'success'=>false,
                'message'=>'Failed Fetch employee data!'
            ],401);
        }
    }

    public function search_employee(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        try{
            if($filterKeyword){
                $employees = Employee::where('name', 'LIKE', "%$filterKeyword%")
                ->orWhere('nip', 'LIKE', "%$filterKeyword%")
                ->paginate(10);
                // echo count($employees);
                // var_dump($employees);die;
                // return response()->json([
                //     'found'=>true,
                //     'message'=>'Search employee data!',
                //     'data' => $employees
                // ],201);
                if(count($employees) > 0):
                    return response()->json([
                        'found'=>true,
                        'message'=>'Search employee data!',
                        'data' => $employees
                    ]);
                else:
                    return response()->json([
                        'found'=> false,
                        'message'=> 'Employee data not found!',
                        'data'=> 'Employee data not found!'
                    ]);
                endif;

            }else{
                $employees=Employee::latest()->paginate(10);
                return response()->json([
                    'ready'=>true,
                    'message'=>'Get employee data!',
                    'data' => $employees
                ],200);
            }
        }catch(Exception $e){
            return response()->json([
                'success'=>false,
                'message'=>'Failed Search employee data!'
            ],404);
        }
       
    }

    public function sorting_employee(Request $request)
    {
        $sort = $request->sort;
        // echo $sort; die;
        if($sort){
            $employees = Employee::orderBy($sort)
            ->paginate(10);
            return response()->json([
                'found'=>true,
                'message'=>'Sorting employee data order by nip',
                'data' => $employees
            ],201);
        }else{
            $employees=Employee::latest()->paginate(10);
            return response()->json([
                'success'=>true,
                'message'=>'Fetch employee data!',
                'data' => $employees
            ],201);
        }
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
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'gender' => 'required',
                'nip' => 'required|numeric',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
                'hoby' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }

            $employee = new Employee;
            $employee->name = strip_tags($request->name);
            $employee->email = strip_tags($request->email);
            $employee->gender = $request->gender;
            $employee->nip = $request->nip;
            $employee->storage = trim(preg_replace('/\s+/', '', $employee->name));
            if($request->file('photo')){
                $file = $request->file('photo')->store($employee->storage.'/profile', 'public');
              $employee->photo = $file;
          }

            $employee->hoby =  $request->hoby;

            $employee->save();

            return response()->json([
                'found'=>true,
                'message'=>'Added new employee success',
                'data' => $employee
            ],201);


        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 401);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        try{
            return response()->json([
                'success' => true,
                'message' => 'Fetch employee detail',
                'data' => $employee
            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
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
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'gender' => 'required',
                'nip' => 'required|numeric',
                // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
                'hoby' => 'required'
            ]);

            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }

            $employee = Employee::findOrFail($id);
            $employee->name = strip_tags($request->name);
            $employee->email = strip_tags($request->email);
            $employee->gender = $request->gender;
            $employee->nip = $request->nip;
            $employee->storage = trim(preg_replace('/\s+/', '', $employee->name));
            if($request->file('photo')){
                $file = $request->file('photo')->store($employee->storage.'/profile', 'public');
              $employee->photo = $file;
          }

            $employee->hoby =  $request->hoby;

            $employee->save();

            return response()->json([
                'found'=>true,
                'message'=>'Update employee success',
                'data' => $employee
            ],201);


        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $employee = Employee::findOrFail($id);
       try{
            $employee->delete();
             return response()->json([
                'success' => true,
                'message' => $employee->name.' delete successfull !!!',
                'data' => $employee
            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
       }
    }
}
