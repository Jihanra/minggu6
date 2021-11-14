<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;
use PDF;

//funsgi fili ini untuk menyediakan fungsi CRUD untuk tabel students. Sehingga kita tidak perlu membuat masing-masing route


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //digunakan untuk mengambil semua data students.
    {
        $student = Student::with('kelas')->get();
        return view('students.index', ['student'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //dgunakan untuk menampilkan halaman create
    {
        $kelas = Kelas::all();
        return view('students.create',['kelas'=>$kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //untuk memproses penambahan data. Jika penambahan data berhasil akan redirect ke halaman students.index
    {
        $student = new Student;

        if($request->file('photo')){
            $image_name = $request->file('photo')->store('images','public');
            }

        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->department = $request->department;
        $student->phone_number = $request->phone_number;
        $student->photo = $image_name;

        $kelas = new Kelas;
        $kelas->id = $request->Kelas;

        $student->kelas()->associate($kelas);
        $student->save();

        // if true, redirect to index
        return redirect()->route('students.index')->with('success', 'Add data success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.view',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //untuk menampilkan halaman edit
    {
        $student = Student::find($id);
        $kelas = Kelas::all();
        return view('students.edit',['student'=>$student,'kelas'=>$kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //untuk memproses perubahan data. Jika perubahan data berhasil akan redirect ke halaman students.index
    {
        $student = Student::find($id);
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->department = $request->department;
        $student->phone_number = $request->phone_number;

        if($student->photo && file_exists(storage_path('app/public/'. $student->photo)))
        {
        \Storage::delete('public/'.$student->photo);
        }
        $image_name = $request->file('photo')->store('images',
        'public');
        $student->photo = $image_name;


        $kelas = new Kelas;
        $kelas->id = $request->Kelas;

        $student->kelas()->associate($kelas);
        $student->save();
        
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //untuk memproses hapus data. Jika perubahan data berhasil akan redirect ke halaman students.index
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $student = student::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('students.index', compact('student'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function detail($id)
    {
        $student = Student::find($id);
        return view('students.detail', ['student'=>$student]);
    }
    public function report($id){
        $student = Student::find($id);
        $pdf = PDF::loadview('students.report',['student'=>$student]);
        return $pdf->stream();
       }
       
    public function __construct()
    {
    $this->middleware('auth');
    }
}
