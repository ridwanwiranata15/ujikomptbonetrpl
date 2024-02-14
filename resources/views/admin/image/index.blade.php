@extends('layouts')
@section('title', 'Data Foto')
@section('content')
    <div class="card">

        <div class="card-body">
            <a href="{{route('admin.image.create')}}" class="btn btn-success m-2">
                Tambah Foto
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Judul Postingan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $item)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{$item->title}}</th>
                        <th><img src="{{url('storage/'.$item->file)}}" alt="" width="100px" height="100px"></th>
                        <th>
                            <a href="{{route('admin.image.edit', $item->id)}}">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </a>
                            <form action="{{route('admin.image.delete', $item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau di hapus?')">Delete</button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
