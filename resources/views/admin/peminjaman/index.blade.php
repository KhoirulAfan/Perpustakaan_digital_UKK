<x-adminlayout>
    <div class="mb-2">
        <h2>Data Peminjaman</h2>
        <small>Menampilkan data Peminjaman</small>
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
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah</a>
    <a href="{{ route('laporan.form') }}" class="btn btn-primary">Cetak Laporan</a>
    <a href="{{ route('laporan.download.form') }}" class="btn btn-primary">Download Laporan</a>
    <div class="table-responsive">
        <table class="table table-bordered mt-2"> 
            <thead >
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Buku yang dipinjam</th>
                    <th >Nama Peminjam</th>
                    <th width="10%">Status</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
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
                                <h6 class="bg-primary px-2 py-1 text-white rounded w-100">{{ $item->buku->judul }}</h6>                                
                                <img src="{{ asset('storage/sampul/'.$item->buku->sampul) }}" alt="" class="img-fluid rounded" width="120px">
                            </td>
                            <td>{{ $item->user->nama }}</td>
                            <td>
                                <p class="badge {{ $item->status == 'pinjam' ? 'bg-danger' : 'bg-success' }}">
                                    {{ $item->status }}
                                </p>
                            </td>
                            
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali ?? 'buku belum dikembalikan' }}</td>
                            <td>
                                <div class="d-flex gap-2">                                
                                    <form action="{{ route('peminjaman.kembali',$item->id) }}" method="POST">                                        
                                        @csrf                                    
                                        <button class="btn btn-success" {{ $item->status == 'kembali' ? 'disabled' : '' }} onclick="return confirm('Anda yakin ingin mengembalikan buku ini??')">Kembalikan</button>
                                    </form>                                    
                                    <a class="btn btn-secondary" href="{{ route('peminjaman.edit',$item->id) }}">Edit</a>
                                    <form action="{{ route('peminjaman.destroy',$item->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf                                    
                                        <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini??')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    {{ $data->links('pagination::bootstrap-5') }}
                @else
                Data Kosong
                @endif
            </tbody>
        </table>
    </div>
</x-adminlayout>