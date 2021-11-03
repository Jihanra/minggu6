@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Student Report</h2></div>

                <div class="card-body">
                    <b>Name</b>     : {{ $student->name }} <br>
                    <b>NIM</b>      : {{ $student->nim }} <br>
                    <b>Class</b>    : {{ $student->kelas->class_name }} <br><br>
                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student->courses as $sc)
                            <tr>
                                <td>{{ $sc->course_name }}</td>
                                <td>{{ $sc->semester }}</td>
                                <td>{{ $sc->sks }}</td>
                                <td>{{ $sc->pivot->nilai }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection