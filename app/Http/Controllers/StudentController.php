<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = Student::with('jurusan')->get(); // select * from student
        return view('student.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $response = Http::withHeaders([
        //     'Authorization' => '6naUgeZVU5kaWbzxe5NH'
        // ])->asForm()->post('https://api.fonnte.com/send', [
        //     'target' => '6281315075445',
        //     'message' => 'data baru atas nama',
        // ]);
        
        // if($response){
        //     return redirect('student');
        // };


        $data['jurusan'] = Jurusan::all();
        return view('student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        \Log::debug($request);
        \Log::info ("Ini proses insert data");
        $student = new Student();
        $student->name = $request->name;
        $student->nis = $request->nis;
        $student->birth_date = $request->birth_date;
        $student->jurusan_id = $request->jurusan_id;
        $student->save();
        return redirect('student')->with('message', 'Berhasil Menambah Data');

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
        $student = Student::find($id);
        if($student==null){
            \Sentry::captureMessage('Student Dengan ID : '.$id.' Tidak Ditemukan');
            return 'Data Tidak Ditemukan';
        }else{

            $data['student'] =  $student;
            $data['jurusan'] = Jurusan::all();
            return view('student.edit',$data);
        }
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

        $student = Student::find($id);
        $student->update($request->all());
        return redirect('student')->with('message','Berhasil Mengubah Data');
    }
    // public function update(Request $request, $id)
    // {
    //     $student = Student::find($id);
    //     $student->update($request->all());
    //     return redirect('student')->with('message','Berhasil Mengubah Data');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('student')->with('message','Berhasil Menghapus Data');
    }
}
