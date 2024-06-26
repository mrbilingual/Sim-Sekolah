@extends('template')
@section('content')
<main class="container" style="margin-top: 30px">
    <form action="/student/{{$student->id}}" method="POST">
        <input type="hidden" value="PUT" name="_method">
        @csrf
    <div class="p-5 rounded">
      <h1>Tambah Siswa</h1>
      <a class="btn btn-danger" href="/student/create">Tambah Siswa Baru</a>
      <hr>
      <table class="table table-bordered">
        <tr>
            <td>NIS</td>
            <td><input type="text" name="nis" value="{{$student->nis}}" placeholder="NIS" class="form-control"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="name" value="{{$student->name}}" placeholder="NAME" class="form-control"></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><input type="date" name="birth_date" value="{{$student->birth_date}}" placeholder="Tanggal Lahir" class="form-control"></td>
        </tr>
        <td>Jurusan</td>
        <td>
            <select name="jurusan_id" class="form-control">
            @foreach($jurusan as $j)
                <option value="{{ $j->id}}">{{$j->nama_jurusan}}</option>
            @endforeach
        </select>
        </td>
        <tr>
            <td>
                <button type="submit" class="btn btn-danger">Simpan</button>
                <a class="btn btn-success" href="/student">Kembali</a>
            </td>
        </tr>
      </table>
    </div>
</form>
  </main>
  @endsection