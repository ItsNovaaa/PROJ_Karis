@push('script')
<script>
    var dataTable;
    $(function() {
      dataTable = $('#datatable').dataTable({
          // contentType: "application/json; charset=utf-8",
          processing: true,
          serverside: true,
          sort:false,
          // scrollY: false,
          ajax: "{{ route('pegawai.datatable') }}",
          columns: [
          //   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'Nama'},
            {data: 'email', name: 'kegiatan'},
            // {
            //       data: "isaktif_kegiatan",
            //       render: function (data) {
            //           if (data === '1' ) {
            //               return '<span class="badge" style=" width: 90px; border-radius: 4px; color:#50CDA3; background: #E8FFF3; box-shadow: -4px 4px 5px 0px #E8FFF3;">Active</span>';
            //           } else {
            //               return '<span class="badge" style=" width: 90px; border-radius: 4px; color:#F1416C; background: #FFF2F1; box-shadow: -4px 4px 5px 0px #FFF2F1;">In Active</span>';
            //           }
            //       }
            //   },
            {data: 'action', name: 'aksi'},
          //   {data: '_', searchable: false, orderable: false, class: 'text-center'},

        ]
        });
    });

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    

    $('body').on('click','.conva', function(e){
            e.preventDefault();
            $('#offcanvasExampleAdd').offcanvas('show');
            $('#form')[0].reset();
            $('.confir').click(function() {
            Swal.fire({
            title: 'Apakah Anda yakin ingin menyimpan data?',
            text: 'Data yang telah disimpan tidak dapat diubah kembali.',
            icon: 'warning',
            showCancelButton: true,
            width: 500,
            confirmButtonColor: '#217AFF',
            // confirmTextButtonColor: '#B9D5FF',
            cancelButtonColor: '#F1416C',
            confirmButtonText: 'Ya, simpan',
            cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Simpan data
                        $.ajax({
                            url:'{{ route('pegawai.storeOrUpdate') }}',
                            type:'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: $('#form').serialize(),
                            success: function(response) {
                                if (response.success) {
                                    console.log(response.message); // Log errors to console

                                    // Refresh datatable
                                    $('#datatable').DataTable().ajax.reload();

                                    // Tampilkan pesan sukses
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: 'Data berhasil disimpan.',
                                        icon: 'success',
                                        timer:1500
                                    });
                                    $('#offcanvasExampleAdd').offcanvas('hide');

                                    // Reset the form
                                    $('#form')[0].reset();
                                } else {
                                    // Refresh datatable
                                    console.log(response.errors); // Log errors to console

                                // Display error message
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message || 'Terjadi kesalahan.',
                                    icon: 'error',
                                    timer: 1500
                                });
                                }
                            }
                        });
                    }
                });

            });
        });

$('body').on('click', '.conva-edit', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var selectedValue = $('#id').val();
      $('#id').val(id);
      $(document).data('id', id);
      $.ajax({
        url:'{{ route('pegawai.show') }}/' + id,
        type:'GET',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          success: function (response) {
              $('#offcanvasExampleAdd').offcanvas('show');
              $('#email').val(response.result?.email );
              $('#nama_pegawai').val(response.result?.nama_pegawai);
              $('#jenis_kelamin_pegawai').val(response.result?.jenis_kelamin_pegawai);
              $('#tempat_lahir_pegawai').val(response.result?.tempat_lahir_pegawai);
              $('#tanggal_lahir_pegawai').val(response.result?.tanggal_lahir_pegawai);
              $('#alamat_pegawai').val(response.result?.alamat_pegawai);
              $('#nomor_telepon').val(response.result?.nomor_telepon);
        //       
          }
      });
  });
    $(document).on('click', '.confir', function (e) {
      e.preventDefault();
      var id = $('#id').val();

      // var id = $(document).data('id'); // Retrieve the stored 'id'
      console.log(id);
      Swal.fire({
          title: 'Apakah Anda yakin ingin menyimpan data?',
          text: 'Data yang telah disimpan tidak dapat diubah kembali.',
          icon: 'warning',
          showCancelButton: true,
          width: 500,
          confirmButtonColor: '#217AFF',
          cancelButtonColor: '#F1416C',
          customClass: { icon: 'no-border' },
          confirmButtonText: 'Ya, simpan',
          cancelButtonText: 'Batal',
      }).then((result) => {
          if (result.isConfirmed) {
            var formData = $('#form').serialize();
              $.ajax({
                url:'{{ route('pegawai.storeOrUpdate') }}/'+id,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                  success: function (response) {
                      if (response.errors) {
                          console.log(response.errors);
                          // Tampilkan pesan error
                          Swal.fire({
                              title: 'Error',
                              text: response.message,
                              icon: 'error',
                              // customClass: { icon: 'no-border' },
                              timer: 1500
                          });
                      } else {
                          // Refresh datatable
                          $('#datatable').DataTable().ajax.reload();

                          // Tampilkan pesan sukses
                          Swal.fire({
                              title: 'Sukses',
                              text: 'Data berhasil disimpan.',
                              icon: 'success',
                              timer: 1500
                          });
                      }
                  }
              });
          }
      });
});

  
$(document).on('click', '.delete-data', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var selectedValue = $('#id').val();
    console.log(id);
    Swal.fire({
    title: 'Apakah Anda yakin ingin hapus data?',
    text: 'Data yang telah disimpan tidak dapat diubah kembali.',
    icon: 'warning',
    showCancelButton: true,
    width: 500,
    confirmButtonColor: '#217AFF',
    cancelButtonColor: '#F1416C',
    customClass: { icon: 'no-border' },
    confirmButtonText: 'Ya, hapus',
    cancelButtonText: 'Batal',
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url:'{{ route('pegawai.delete') }}/'+id,
            type: "DELETE",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.errors) {
                    console.log(response.errors);
                    // Tampilkan pesan error
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        timer: 1500
                    });
                } else {
                    // Refresh datatable
                    $('#datatable').DataTable().ajax.reload();

                    // Tampilkan pesan sukses
                    Swal.fire({
                        title: 'Sukses',
                        text: 'Data berhasil dihapus.',
                        icon: 'success',
                        timer: 1500
                    });
                }
            },
        });
    }
    });
});

</script>
@endpush
