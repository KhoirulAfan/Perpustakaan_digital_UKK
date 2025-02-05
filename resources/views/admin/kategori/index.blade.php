<x-adminlayout>
    <div class="mb-2">
        <h2>Data kategori</h2>
        <small>Menampilkan semua kategori</small>
    </div>
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession  
    @session('error')
        <script>
            alert("{{ session('error') }}")
        </script>
    @endsession  
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah</a>
    <table class="table table-bordered mt-2"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>              
                <th>Dibuat pada</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($data)
                @php $no = 1 @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>                       
                        <td>{{ $item->created_at ? $item->created_at->format('d F Y') : '' }}</td>
                        <td>
                            <div class="d-flex gap-2">                                
                                <a class="btn btn-secondary" href="{{ route('kategori.edit',$item->id) }}">Edit</a>
                                <form action="{{ route('kategori.destroy',$item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf                                    
                                    <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{ $data->links() }}
            @else
            Data Kosong
            @endif
        </tbody>
    </table>
</x-adminlayout>