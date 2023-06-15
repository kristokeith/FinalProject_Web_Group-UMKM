$(document).ready(function() {
    $('#ratingForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                alert(response.message);
                // Tambahkan logika atau perubahan lainnya setelah rating berhasil disimpan
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});
