@extends('template')
@section('content')
<main class="container">
    <div class="p-5 rounded">
      <h1>Daftar Siswa</h1>
      <a class="btn btn-danger" href="/student/create">Tambah Siswa Baru</a>
      <hr>
      @if (session('message')!='')
      <div class="alert alert-primary " dismissable="true" role="alert">
        {{session('message')}}
      </div>
      @endif
      <table class="table table-bordered">
        <tr>
            <th>Nomor</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$student->nis}}</td>
          <td>{{$student->name}}</td>
          <td>{{$student->birth_date}}</td>
          <td>{{$student->created_at}}</td>
          <td>{{$student->updated_at}}</td>
        <td>
            <a href="/student/{{ $student->id }}/edit" class="btn btn-danger">Edit</a>
        </td>
        <td>
          
            <form action="/student/{{ $student->id }}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            @csrf
            <button type="submit" class="btn btn-primary">Delete</button>
            </form>
        </td>
       
        </tr>
        @endforeach
      </table>
    </div>
  </main>
  @endsection