@php    
Header("Content-Type:application/vnd.ms-excel");
Header("Content-Disposition:attachment; fileName=Laporan-peminjaman-$tgl1-$tgl2-$status.xls")
@endphp
<table class="table table-bordered mt-2" border="1"> 
    <thead>
        <tr>
            <th colspan="5">Laporan Peminjaman Perputakaan Digital</th>
        </tr>
        <tr>
            <th colspan="5">Dari {{ $tgl1 }} Hingga {{ $tgl2 }}</th>                    
        </tr>
        <tr>
            <th colspan="5">Digenerate Oleh {{ Auth::guard('admins')->user()->nama }}</th>

        </tr>
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