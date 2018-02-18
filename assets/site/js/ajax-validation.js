$('#warna').addClass('hidden');
$('.AddForm').on('submit' ,function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        method: 'POST',
        dataType: 'json',
        data: form.serialize(),
        url: url,
        success: function (response) {
            if (response.status == 'success'){
                if(response.id == 'warna') {
                    $('#warna').html(response.data)[0].className = 'alert alert-success';
                } else {
                    $('#update-lower').html(response.data)[0].className = 'alert alert-success';
                }
            }else{
                if(response.id == 'warna') {
                    $('#warna').html(response.data)[0].className = 'alert alert-danger';
                } else {
                    $('#update-lower').html(response.data)[0].className = 'alert alert-danger';
                }
            }
        }
    });

    form.get([0]).reset();

    $('#warna').removeClass('hidden');

});

$('.addFormWithImage').on('submit' ,function (e) {
    e.preventDefault();
    var form = $(this);
    var url  = form.attr('action');

    $.ajax({
        url: url,
        type: "POST",
        data: new FormData(form[0]),
        contentType: false,
        cache: false,
        processData:false,

        success: function (response) {
            if (response.status == 'success'){
                $('#warna').html(response.data)[0].className = 'alert alert-success';
            }else{
                $('#warna').html(response.data)[0].className = 'alert alert-danger';
            }
        }
    });

    $('#warna').removeClass('hidden');
});

$('.editTypeBTN').on('click' ,function (e) {
    e.preventDefault();

    var url = $(this).data('url');
    var link = $(this).parents('tr').find('.social_link').val();
    var icon = $(this).parents('tr').find('.social_icon').val();

    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data : {link: link ,icon: icon ,_token: $(this).data('token')},
        success: function (response) {
            if (response.status == 'success') {
                swal({title: "تم بنجاح", text: response.data, type: "success"}, function () {
                    location.reload(true);
                });
            } else {
                swal('خطا', response.data, 'error');
            }
        }
    });

});

$('#comment-form').on('submit', function (e) {
    e.preventDefault();
    var url = $(this).attr('action');
    var form = $(this);


    $.ajax({
        url: url,
        dataType: 'json',
        method: 'POST',
        data : form.serialize(),
        success: function (response) {
            if (response.status == 'success') {
                $('#comment').html(response.html);
                form.get(0).reset();
            } else {

            }
        }
    });
});
