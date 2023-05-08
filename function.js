$('#button-href').click(function() {
    a = $('#button-href').attr('href')

    window.location.href = "index.php?p="+a
})


$('#add-data-form').submit(function(e) {
    e.preventDefault()
    var formdata = new FormData();

    formdata.append('photo', document.getElementById("photo").files[0])
    formdata.append('name', $('#name').val())
    formdata.append('email', $('#email').val())


    $.ajax({
        url: "backend/add-data.php",
        method: "POST",
        dataType : 'json',
        cache : false,
        contentType : false,
        processData : false,
        data: formdata,
        success: function (data) {
            $('#result-alert').html(`
                <div class="alert alert-primary" role="alert">
                    Data created !
                </div>
            `)

            window.location.href = "index.php?p=home"
        },
        error: function(xhr) {
            if (typeof xhr.responseJSON.message === "string") {
                message = xhr.responseJSON.message
            } else {
                message = xhr.responseJSON.message.join()
            }

            $('#result-alert').html(`
                <div class="alert alert-danger" role="alert">
                    `+ message +`
                </div>
            `)
        }
    })
})