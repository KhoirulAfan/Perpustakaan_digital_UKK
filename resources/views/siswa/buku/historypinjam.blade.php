<x-siswalayout>
    <div class="mb-2">
        <h2>History pinjam</h2>
        <small>Menampilkan semua yang pernah dipinjam</small>
    </div>
    @session('success')
        <script>
            alert("{{ session('success') }}")
        </script>
    @endsession        
    <div class="table-responsive">
        <table class="table table-bordered mt-2 text-center"> 
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Sampul</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    {{-- <th width="15%">Status</th> --}}
    
                    <th width="20%">Tanggal pinjam</th>
                    <th width="20%">Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>                
                    @php $no = 1 @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <img src="{{ asset('storage/sampul/'.$item->buku->sampul) }}" alt="" class="img-fluid" width="120px">
                            </td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->buku->penulis }}</td>
                            <td>{{ $item->buku->tahun_terbit }}</td>
                            {{-- <td>
                                <div class="badge bg-primary">
                                    {{ $item->buku->status }}
                                    
                                </div>
                            </td>   --}}
                            <td>
                                {{ $item->tanggal_pinjam }}                                
                            </td>
                            <td>
                                {{ $item->tanggal_kembali }}                                
                            </td>
                        </tr>
                    @endforeach
                    
                    {{-- {{ $data->links('pagination::bootstrap-5') }} --}}                
            </tbody>
        </table>
        {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
    </div>
</x-siswalayout>