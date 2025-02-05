<x-adminlayout>
    <div class="mb-2">
        <h2>Data Peminjam atau siswa</h2>
        <small>Menampilkan semua peminjam atau siswa</small>
    </div>
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession        
    <table class="table table-bordered mt-2"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>                
                <th>Daftar pada pada</th>
                {{-- <th width="20%">Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            @if ($data)
                @php $no = 1 @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>                       
                        <td>{{ $item->created_at ? $item->created_at->format('d F Y') : '' }}</td>                        
                    </tr>
                @endforeach
                {{ $data->links() }}
            @else
            Data Kosong
            @endif
        </tbody>
    </table>
</x-adminlayout>