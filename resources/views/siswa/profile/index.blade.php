<x-siswalayout>
    <h3>Profile</h3>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-text">{{ $data->nama }}</h6>
                    <p class="card-text">{{ $data->nama }}</p>
                    <p class="card-text">{{ $data->email }}</p>
                    <p class="card-text">{{ $data->alamat }}</p>
                </div>
                <div class="card-body">
                    <a href="{{ route('siswa.favorit.show') }}" class="btn btn-primary">Favorite</a>
                    <a href="{{ route('siswa.pinjam.buku') }}" class="btn btn-primary">Dipinjam</a>
                </div>
            </div>
        </div>
    </div>    
</x-siswalayout>