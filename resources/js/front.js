import ajax from './ajax';

$(document).ready(function () {
    register();
    login();
    findAddressesByPostcode();
    addNewAddressFromOrder()
    ourMenusStartNow()
    resetPassword()
});

function findAddressesByPostcode() {
    let timeout = null;
    let error = '<span class="invalid-feedback">Invalid postcode</span>';

    $(document).on('keyup', '#register-postcode', function (e) {
        let postcode = $(this).val(),

            element = $(this),
            clearTimeout
        (timeout);

        timeout = setTimeout(function () {
            if (postcode.length >= 3) {
                if (element.hasClass('order')) {
                    $.ajax({
                        dataType: "json",
                        type: "POST",
                        url: element.data('route'),
                        data: {
                            'postcode': postcode,
                            "_token": $('[name=csrf-token]').attr('content'),
                        },
                        beforeSend: function () {
                        },
                        success: function (response) {
                            if (response.success) {
                                ajax('GET', 'https://api.getAddress.io/find/' + postcode + '?api-key=DpylZUInjkCVEoJnmz4CNA34409', {}, function (response) {
                                    let clone = '';
                                    let allAddresses = [],
                                        modalId = element.parents('.df-modal').data('modal-id');

                                    $('.register-addresses-option-new').remove();

                                    $.each(response.addresses, function (k, v) {
                                        clone = $('#register-addresses-option').clone();
                                        clone.removeAttr('selected')
                                        clone.html(v)
                                        clone.addClass('register-addresses-option-new');
                                        allAddresses[k] = clone;
                                    })
                                    $('#register-addresses').prepend(allAddresses);
                                    $('#register-addresses-modal-edit_' + modalId).prepend(allAddresses);
                                    element.removeClass('is-invalid')
                                    element.parent().find('.invalid-feedback').remove();
                                }, function (response) {
                                    element.addClass('is-invalid')
                                    $('.invalid-feedback').remove();
                                    element.parent().append(error);
                                })
                            } else {
                                $('.register-addresses-option-new').remove();
                                let clone = '';
                                clone = $('#register-addresses-option').clone();
                                clone.html('<option>This address in not supported</option>')
                                clone.addClass('register-addresses-option-new');
                                $('#register-addresses').prepend(clone)
                            }
                        },
                        error: function (data) {
                        },
                        complete: function () {
                        }
                    });
                } else {
                    ajax('GET', 'https://api.getAddress.io/find/' + postcode + '?api-key=DpylZUInjkCVEoJnmz4CNA34409', {}, function (response) {
                        let clone = '';
                        let allAddresses = [],
                            modalId = element.parents('.df-modal').data('modal-id');

                        $('.register-addresses-option-new').remove();

                        $.each(response.addresses, function (k, v) {
                            clone = $('#register-addresses-option').clone();
                            clone.removeAttr('selected')
                            clone.html(v)
                            clone.addClass('register-addresses-option-new');
                            allAddresses[k] = clone;
                        })
                        $('#register-addresses').prepend(allAddresses);
                        $('#register-addresses-modal-edit_' + modalId).prepend(allAddresses);
                        element.removeClass('is-invalid')
                        element.parent().find('.invalid-feedback').remove();

                        $.ajax({
                            dataType: "json",
                            type: "POST",
                            url: element.data('route'),
                            data: {
                                'postcode': postcode,
                                "_token": $('[name=csrf-token]').attr('content'),
                            },
                            beforeSend: function () {
                            },
                            success: function (response) {
                                if (!response.success) {
                                    $('#dfNotDeliveringArea').modal('show');
                                }
                            },
                            error: function (data) {
                            },
                            complete: function () {
                            }
                        });
                    }, function (response) {
                        element.addClass('is-invalid')
                        $('.invalid-feedback').remove();
                        element.parent().append(error);
                    })
                }

            }
        }, 2000);

        return false;
    })
}

function register() {
    $(document).on('click', '.df-register', function (e) {
        e.preventDefault();
        if (!$('[name=terms]').is(':checked')) {
            alert('The terms field is required !');
            return false;
        }
        if (!$('[name=policy]').is(':checked')) {
            alert('The privacy policy field is required !');
            return false;
        }

        let form = $(this).parents('form');
        let data = form.serializeArray();
        ajax('POST', form.attr('action'), data, function (response) {
            $('#dfUserSignUp').modal('hide');
            $('#dfUserLogin').modal('show');
        }, function (response) {
            $.each(response.responseJSON.errors, function (key, value) {
                let error = '<span class="invalid-feedback">' + value + '</span>',
                    element = $('[name=' + key + ']')
                element.addClass('is-invalid')
                element.parent().append(error);
            })
        });

        return false;
    })
}

function login() {
    $(document).on('click', '.df-login', function (e) {
        e.preventDefault();
        let form = $(this).parents('form');
        let data = form.serializeArray();
        ajax('POST', form.attr('action'), data, function (response) {
            console.log(response);
            window.location.href = response.route;
        }, function (response) {
            $.each(response.responseJSON.error, function (key, value) {
                let error = '<span class="invalid-feedback">' + value + '</span>',
                    element = $('[name=' + key + ']')
                element.addClass('is-invalid')
                element.parent().append(error);
            })

        });
        console.log(data);

        return false;
    })
}

function addNewAddressFromOrder() {
    $(document).on('click', '#add-new-address-from-order', function (e) {
        e.preventDefault();
        let element = $('#add-new-address-from-order');
        let data = element.parents('.modal-body').find(':input').serializeArray();
        ajax('POST', element.data('url'), data, function (response) {
            if (response.success === true) {
                window.location.href = response.redirectUrl;
            }
        }, function (response) {
            console.log(response.responseJSON.errors)
            $.each(response.responseJSON.errors, function (key, value) {
                let error = '<span class="invalid-feedback">' + value + '</span>',
                    element = $('[name=' + key + ']')
                element.addClass('is-invalid')
                element.parent().append(error);
            })

        });

        return false;
    })
}

function ourMenusStartNow() {
    $(document).on('click', '.js-redirect-or-login', function () {
        if ($('#dfUserLogin').length) {
            $('#dfUserLogin').modal('show');
        } else {
            window.location.href = $(this).data('order-url');
        }
    })
}

function resetPassword() {
    $(document).on('click', '.reset-password-js', function (e) {
        e.preventDefault()
        let form = $(this).parents('form'),
            url = form.attr('action');

        ajax('POST', url, form.serializeArray(), function (response) {
            if (response.success === true) {
                let elToAppend = '<span class="alert-success">New password sent successfully.</span>'
                $('.reset-password-js').parents('.modal-body').find('.email-input').append(elToAppend)
            }
        }, function (response) {
            console.log(response)
        })
    })
}
