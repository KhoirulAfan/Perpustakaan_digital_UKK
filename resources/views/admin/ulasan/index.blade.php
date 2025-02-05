<x-adminlayout>
    <div class="mb-2">
        <h2>Ulasan Buku</h2>
        <small>Menampilkan semua Ulasan buku</small>
    </div>
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession    
    <a href="{{ route('ulasan.create') }}" class="btn btn-primary">Tambah</a>
    <table class="table table-bordered mt-2"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Buku</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($data)
                @php $no = 1 @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->user->nama }}</td>
                        <td>
                            <img src="{{ asset('storage/sampul/'.$item->buku->sampul) }}" alt="" width="120px">
                            <h6>
                                {{ $item->buku->judul }}</td>
                            </h6>
                        <td>{{ $item->rating }}</td>
                        <td>{{ $item->ulasan }}</td>
                        
                        <td>
                            <div class="d-flex gap-2">                                
                                <a class="btn btn-secondary" href="{{ route('ulasan.edit',$item->id) }}">Edit</a>
                                <form action="{{ route('ulasan.destroy',$item->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf                                    
                                    <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach                
            @else
            Data Kosong
            @endif
        </tbody>
    </table>
</x-adminlayout>