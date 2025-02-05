<x-adminlayout>
    <div class="mb-2">
        <h2>Buku</h2>
        <small>Menampilkan semua buku</small>
    </div>   
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession        
    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah</a>
    <div class="table-responsive">
        <table class="table table-bordered mt-2 text-center"> 
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Sampul</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    {{-- <th width="15%">Status</th> --}}
    
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data)
                    @php $no = 1 @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <a href="{{ route('buku.show',$item->id) }}">
                                    <img src="{{ asset('storage/sampul/'.$item->sampul) }}" alt="" class="img-fluid rounded" width="120px">
                                </a>
                            </td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penerbit }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->tahun_terbit }}</td>
                            {{-- <td>
                                <div class="badge bg-primary">
                                    {{ $item->status }}
                                    
                                </div>
                            </td>   --}}
                            <td>
                                <div class="d-flex gap-2">                                
                                    <a class="btn btn-secondary" href="{{ route('buku.show',$item->id) }}">Detail</a>
                                    <a class="btn btn-secondary" href="{{ route('buku.edit',$item->id) }}">Edit</a>
                                    <form action="{{ route('buku.destroy',$item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf                                    
                                        <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
                @else
                Data Kosong
                @endif
            </tbody>
        </table>
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
</x-adminlayout>