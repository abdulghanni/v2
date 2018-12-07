$("#datatable").dataTable({
	"order": [[ 0, "desc" ]]
});

function hapus(id){
	if(confirm("Apakah anda yakin ingin menghapus berita ini???")){
		$.ajax({
	        url: base_url + "admin/berita/delete/" + id,
	        success: function (data) {
	            alert("Berita berhasil dihapus...");
	            location.reload();
	        },
	        error: function (jqXHR, textStatus, errorThrown) {
	            alert('Gagal menghapus berita, silakan muat ulang halaman dan coba lagi');

	        }
	    });
	}
}