
$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');
    

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'auth/login.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {

            if (data.status) {
                document.location.href = '/index.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);
            }

        }
    });

});

let avatar = false;
$('input[name="avatar"]').change(function (e) {
    avatar = e.target.files[0];
});


$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val(),
        full_name = $('input[name="full_name"]').val(),
        email = $('input[name="email"]').val(),
        organization = $('input[name="organization"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);
    formData.append('full_name', full_name);
    formData.append('email', email);
    formData.append('organization', organization);
    formData.append('avatar', avatar);


    $.ajax({
        url: 'auth/register.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/signin.php';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});


let photo = false;
$('input[name="photo"]').change(function (e) {
    photo = e.target.files[0];
});


$('.sell-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');
    $(`select`).removeClass('error');

    let region = $('select[name="region"]').val(),
        sity = $('select[name="sity"]').val(),
        make = $('select[name="make"]').val(),
        model = $('select[name="model"]').val(),
        volume = $('input[name="volume"]').val(),
        mileage = $('input[name="mileage"]').val(),
        numOfOwners = $('input[name="numOfOwners"]').val(),
        price = $('input[name="price"]').val();

    let formData = new FormData();
    formData.append('region', region);
    formData.append('sity', sity);
    formData.append('make', make);
    formData.append('model', model);
    formData.append('volume', volume);
    formData.append('mileage', mileage);
    formData.append('numOfOwners', numOfOwners);
    formData.append('status', status);
    formData.append('price', price);
    formData.append('photo', photo);


    $.ajax({
        url: 'crud/create.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {

            if (data.status) {
                document.location.href = '/';
            } else {

                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                        $(`select[name="${field}"]`).addClass('error');
                    });
                }

                $('.msg').removeClass('none').text(data.message);

            }

        }
    });

});


$('.search-btn').click(function (e){
    e.preventDefault();

    let region = $('select[name="region"]').val(),
        sity = $('select[name="sity"]').val(),
        make = $('select[name="make"]').val(),
        model = $('select[name="model"]').val(),
        volume = $('input[name="volume"]').val(),
        mileage = $('input[name="mileage"]').val(),
        numOfOwners = $('input[name="mileage"]').val();

    let formData = new FormData();
    if(region != 'none'){
        formData.append('region', region);
    }
    if(sity != 'none'){
        formData.append('sity', sity);
    }
    if(make != 'none'){
        formData.append('make', make);
    }
    if(model != 'none'){
        formData.append('model', model);
    }
    if(volume != ''){
        formData.append('volume', volume);
    }
    if(mileage != ''){
        formData.append('mileage', mileage);
    }
    if(numOfOwners != ''){
        formData.append('numOfOwners', numOfOwners);
    }
    
    $.ajax({
        url: 'index.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            $("#publ").html('');
            for(value in data){
                $("#publ").append(
                    '<div class="col-lg-4 col-md-6 mb-4">' + 
                        '<div class="card">' +
                            '<div class="view overlay">'+
                                '<img style="height: 200px;" src="'+ data[value]['photo'] + '" alt="img">'
                            + '</div>'+ 
                            '<div class="card-body text-center">'+
                                '<a class="text-dark" href="">'+
                                    '<h5 class="font-weight-bold">' + data[value]['make'] + '  ' + data[value]['model'] +'</h5>'
                                +'</a>'+
                                '<h5>'+
                                    '<strong>'+
                                        '<a class="text-secondary" href="">'+
                                            '<span class="badge badge-pill text-danger">Number of owners:</span>' + data[value]['numOfOwners']
                                        +'</a>'
                                    +'</strong>'
                                + '</h5>'+
                                '<h5>'+
                                    '<strong>'+
                                        '<a class="text-secondary" href="">'+ data[value]['volume'] + '(Л)' + '   ' + data[value]['mileage'] + '(км)'
                                        +'</a>'
                                    +'</strong>'
                                + '</h5>'+
                                '<div class="p-3 mb-2 bg-warning text-dark">'+
                                    '<h3 class="font-weight-bold">'+
                                        '<strong>' + data[value]['price'] + '($)' + '</strong>'
                                    + '</h3>'
                                + '</div>'
                            + '</div>'
                        + '</div>'
                    + '</div>'
                );
            }
        }
    });
});
