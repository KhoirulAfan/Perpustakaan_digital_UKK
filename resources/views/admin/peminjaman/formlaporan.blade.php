<x-adminlayout>
    <div class="mb-2">
        <h2>Cetak Laporan peminjaman</h2>
        <small>Cetak Laporan Peminjaman</small>
    </div>
    
    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
    <div class="row mt-2">
        <div class="col-12 col-md-6">
            <form action="{{ route('laporan.proses') }}" method="GET" target="_blank">                
                <div class="mb-2 form-floating">
                    <input type="date" name="tanggal1" class="form-control @error('tanggal1') is-invalid @enderror" placeholder="Masukkan tanggal1" id="tanggal1" value="{{ old('tanggal1') }}"> 
                    <label for="tanggal1" class="form-label">Dari</label>
                    @error('tanggal1') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    <input type="date" name="tanggal2" class="form-control @error('tanggal2') is-invalid @enderror" placeholder="Masukkan tanggal2" id="tanggal2" value="{{ old('tanggal2') }}"> 
                    <label for="tanggal2" class="form-label">Hingga</label>
                    @error('tanggal2') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <div class="mb-2 form-floating">
                    
                    <select name="status" id="status" class="form-select">
                        
                        
                            <option value="semua" class="form-control">Semua</option>                     
                            <option value="kembali" class="form-control">Sudah dikembalikan</option>                     
                            <option value="pinjam" class="form-control">Belum Kembali</option>                     
                    </select>
                    <label for="status" class="form-label">Filter status</label>                    
                    @error('status') 
                        <div class="invalid-feedback">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                {{-- <x-floatingform name="nama">Nama</x-floatingform> --}}
                <button class="btn  btn-primary">Generate</button>
            </form>
        </div>
    </div>
</x-adminlayout>