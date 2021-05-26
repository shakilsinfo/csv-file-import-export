<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use DB;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $userData = User::all(); 

        return view('import',compact('userData'));
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
        if($request->import_new_data ==2){
            $findOldData = User::get();
            session(['userOldData'=>$findOldData]);
            $data = Excel::toArray(new UsersImport,request()->file('file'));
            
            $total = 0;
            collect(head($data))
            ->each(function ($row, $key) {
                
                $updateData = User::where('phone',$row['phone'])->first();
                
                $response = DB::table('users')
                    ->where('phone', $row['phone'])
                    ->update(array_except($row, ['phone']));

                $total =+ DB::table('users')
                    ->where('phone', $row['phone'])->count();
                    
            }); 
           
            flash(__($total. 'Cell Updated successfully'))->success();
        
        }else{
            Excel::import(new UsersImport,request()->file('file'));
        }
        
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users-list.csv');
    }
    public function import() 
    {

    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    
}
