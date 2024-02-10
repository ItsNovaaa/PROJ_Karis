<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExampleAdd" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Add Barang</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
    {{-- <form action="{{ route('admin.store') }}" method="POST"> --}}
    {{-- @csrf --}}
      <div class="offcanvas-body mx-3">
        <form id ="form">
          @include('barang.form')
        </form>
      </div>
  </div>
