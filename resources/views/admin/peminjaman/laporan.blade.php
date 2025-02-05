<table class="table table-bordered mt-2" border="1"> 
    <thead>
        
        <tr>
            <th width="5%">No</th>
            <th width="20%">Buku yang dipinjam</th>
            <th width="20%">Status</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>            
        </tr>
    </thead>
    <tbody>
        @if ($data)
            @php $no = 1 @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>                        
                        {{ $item->buku->judul }}
                    </td>
                    <td>
                        <p class="badge {{ $item->status == 'pinjam' ? 'bg-danger' : 'bg-success' }}">
                            {{ $item->status }}
                        </p>
                    </td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali ?? 'buku belum dikembalikan' }}</td>                    
                </tr>
            @endforeach            
        @else
        Data Kosong
        @endif
    </tbody>
</table>
<script>
    document.title = "Laporan Peminjaman Buku dari {{ $tgl1 }} Hingga {{ $tgl2 }}";
    window.print()  
</script>