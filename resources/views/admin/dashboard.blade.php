<x-adminlayout>
     <div class="alert alert-primary">
          Selamat datang di website perpustakkan digital, {{ Auth::guard('admins')->user()->nama }} !!
     </div>
</x-adminlayout>