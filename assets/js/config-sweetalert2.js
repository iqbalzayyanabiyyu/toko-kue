const flashData_success = $('.flashdata-success').data('flashdata');

if (flashData_success) {
	Swal.fire({
		title: 'Berhasil',
		text: flashData_success + '!',
		icon: 'success'
	});
}

const flashData_failed = $('.flashdata-failed').data('flashdata');
if (flashData_failed) {
	Swal.fire({
		title: 'Gagal',
		text: flashData_failed + '!',
		icon: 'error'
	});
}



$('.btn-hapus').on('click', function(e){
	e.preventDefault();

	const href = $(this).attr('href');
	const nama 	= $(this).data('nama');

	Swal.fire({
	  title: 'Apakah Anda yakin?',
	  text: "Menghapus data " + nama,
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus Data!'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	});
});