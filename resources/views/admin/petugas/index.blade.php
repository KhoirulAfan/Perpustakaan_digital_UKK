<x-adminlayout>
    <div class="mb-2">
        <h2>Data Petugas dan admin</h2>
        <small>Menampilkan semua petugas dan admin</small>
    </div>
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession  
    @if (Auth::guard('admins')->user()->role == 'admin')
                
        <a href="{{ route('petugas.create') }}" class="btn btn-primary">Tambah</a>
    @endif  
    <table class="table table-bordered mt-2"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Dibuat pada</th>
                @if (Auth::guard('admins')->user()->role == 'admin')
                <th width="20%">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if ($data)
                @php $no = 1 @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            <div class="badge {{ $item->role == 'admin' ? 'bg-danger' : 'bg-warning' }}">
                                {{ $item->role }}
                            </div>
                        </td>
                        <td>{{ $item->created_at ? $item->created_at->format('d F Y') : '' }}</td>
                        @if (Auth::guard('admins')->user()->role == 'admin')
                        <td>
                            <div class="d-flex gap-2">
                                
                                <form action="{{ route('petugas.destroy',$item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf                                    
                                    <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</button>
                                </form>                                    
                                
                            </div>
                        </td>
                        @endif
                    </tr>
                @endforeach
                {{ $data->links() }}
            @else
            Data Kosong
            @endif
        </tbody>
    </table>
</x-adminlayout>