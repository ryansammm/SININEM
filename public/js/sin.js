$('body').on('click', '.modal-show', function(event){
    event.preventDefault();

    var me = $(this),
    url = me.attr('href'),
    title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').text(me.hasClass('edit') ? 'Update' : 'Simpan');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
    url = form.attr('action'),
    method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.help-block').remove();
    form.find('.form-group').removeClass('has-error');
    
    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success : function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#table').DataTable().ajax.reload();

            swal({
                type : 'success',
                title : 'Success!',
                text : 'Data berhasil disimpan!'
            });
        },
        error : function (xhr){
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false){
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                        .closest('.form-group')
                        .addClass('has-error')
                        .append('<span class="help-block">' + value + '</span>')
                })
            }
        }
    })
});

$('body').on('click', '.btn-delete', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title'),
        csrf_token = $('meta[name="csrf-token"]').attr('content');
        
    swal({
        title: 'Anda yakin akan menghapus data ini?' + title + ' ?',
        text: 'Kamu dapat membatalkan ini',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus saja!'
    }).then((result) => {
        if (result.value){
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': "DELETE",
                    '_token': csrf_token
                },
                success: function(response){
                    $('#table').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'Data berhasil dihapus'
                    });
                },
                error: function(xhr){
                    swal({
                        type: 'error',
                        title: 'Oops..',
                        text: 'Ada yang salah!'
                    });
                }
            });
        }
    });
});