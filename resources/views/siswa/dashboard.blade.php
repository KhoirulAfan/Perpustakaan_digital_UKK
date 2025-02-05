<x-siswalayout>
     <div class="alert alert-primary">
          Selamat datang diwebsite Perpustakaan Digital !! {{ Auth::guard('web')->user()->nama }}
     </div>
</x-siswalayout>
