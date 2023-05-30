import ajax from './ajax';

$(document).ready(function () {
    if (!$('.admin-class-dont-touch').length) {
        let
            orderStepEl = $('.img-dynamic-order-step'),
            addressId = orderStepEl.data('address-id-step') ?? 0,
            area_id = 0,
            dogId = orderStepEl.data('dog-id-step') ?? 0,
            orderTab2 = $('#pills-order-tab-2'),
            orderTab3 = $('#pills-order-tab-3'),
            orderTab4 = $('#pills-order-tab-4');
        checkSession();

        if (orderStepEl.data('cart-empty') === 1) {
            $.ajax({
                dataType: "json",
                type: "GET",
                url: $('#dog'+$('.data-pet-id-js').data('pet-id-js')).data('url'),
                data: {},
                beforeSend: function () {
                },
                success: function (response) {
                    $('#pills-order-step-2').html(response.view)
                    //това не помня за какво е
                    if (addressId !== 0) {
                        timeslots(area_id);
                    }
                },
                error: function (data) {
                },
                complete: function () {
                }
            });
            if (orderStepEl.data('img-order-step') === 2) {
                console.log($('#dog'+$('.data-pet-id-js').data('pet-id-js')).trigger('click'))
                $.ajax({
                    dataType: "json",
                    type: "GET",
                    url: 'order/recipes/' + (orderStepEl.data('dog-id-step') ? orderStepEl.data('dog-id-step') : $('.data-pet-id-js').data('pet-id-js')),
                    data: {},
                    beforeSend: function () {
                    },
                    success: function (response) {
                        $('#pills-order-step-2').html(response.view)
                        //това не помня за какво е
                        if (addressId !== 0) {
                            timeslots(addressId);
                        }
                    }
                });
                // timeslots(orderStepEl.data('address-id-step'))
                orderTab2.prop('disabled', false);
                orderTab2.trigger('click');
            } else if (orderStepEl.data('img-order-step') === 3) {
                orderTab3.prop('disabled', false);
                orderTab3.trigger('click');
            } else if (orderStepEl.data('img-order-step') === 4) {
                orderTab4.prop('disabled', false);
                orderTab4.trigger('click');
            }
        }

        $('.dog_select').change(function () {
            dogId = $(this).val();

            $.ajax({
                dataType: "json",
                type: "GET",
                url: $(this).data('url'),
                data: {},
                beforeSend: function () {
                },
                success: function (response) {
                    $('#pills-order-step-2').html(response.view)
                    //това не помня за какво е
                    if (addressId !== 0) {
                        timeslots(area_id);
                    }
                },
                error: function (data) {
                },
                complete: function () {
                }
            });
        });

        $('.address_select').change(function () {
            addressId = $(this).val();
            area_id = $(this).attr('data-area_id');

            //това не помня за какво е
            if ($('.dog_select').is(':checked')) {
                // $('.dog_select:checked').trigger('change')
                timeslots(area_id, addressId);
            }
        });

        $('.menu-selection-button').click(function () {
            if (dogId === 0 || addressId === 0) {
                $('#dfChooseDogOrAddress').modal('show')
            } else {
                let menuSelection = $('#pills-order-tab-2'),
                    imgEl = $('.img-dynamic-order-step');
                menuSelection.prop('disabled', false);
                menuSelection.trigger('click');

                imgEl.attr('src', imgEl.attr('src').replace('step1.svg', 'step2.svg'))
            }
        });

        $(document).on('click', '.menuSelect', function (e) {
            $('#addMenuToCart').attr('data-recipeId', $(this).attr('data-recipeId'));
        });

        $(document).on('click', '#addMenuToCart', function (e) {
            let imgEl = $('.img-dynamic-order-step');
            if ($('#order_menu_date').val() == '' || typeof $('[name=timeslot]:checked').val() === 'undefined') {
                alert('Fill the date or time slot')
            } else {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: "order/addToCart",
                    data: {
                        "_token": $('[name=csrf-token]').attr('content'),
                        'pet_id': dogId === 0 ? $('.img-dynamic-order-step').data('dog-id-step') : dogId,
                        'recipe_id': $(this).attr('data-recipeId'),
                        'date': $('#order_menu_date').val(),
                        'timeslot_id': $('[name=timeslot]:checked').val(),
                        'address_id': addressId === 0 ? $('.img-dynamic-order-step').data('address-id-step') : addressId,
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        $('.timeslots-holder').append(response.view)
                        $('.go-to-cart-modal-message').html(response.message)
                        $('#goToCartModal').modal('show')
                        $('.top-cart-notification').removeClass('d-none')
                        $('.top-cart-notification').html(response.itemsInCart)
                        imgEl.attr('src', imgEl.attr('src').replace('step2.svg', 'step3.svg'))
                    },
                    error: function (data) {
                    },
                    complete: function () {
                    }
                });
            }

        });

        $(document).on('shown.bs.modal', '#dfUserOrderDetails', function (e) {
            flatpickr($('#order_menu_date'), {
                altInput: false,
                static: true,
                clickOpens: true,
                theme: 'airbnb',
                minDate: getOrderTime(),
                locale: {
                    "firstDayOfWeek": 1 // start week on Monday
                },
                dateFormat: "d-m-Y",
            });

            function getOrderTime() {
                let from = 16 * 60,
                    to = 23 * 60 + 59,
                    now = new Date();
                let time = now.getHours() * 60 + now.getMinutes();

                if (to > time && from < time) {
                    return now.fp_incr(2);
                }
                return now.fp_incr(1);
            }
        });

        $(document).on('click', '.order-summary-section-button', function (e) {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: $(this).data('url'),
                data: {
                    "_token": $('[name=csrf-token]').attr('content'),
                },
                beforeSend: function () {
                },
                success: function (response) {
                    if (response.success) {
                        $('#pills-order-step-3').html(response.view);
                        checkSession();
                        $('#pills-order-tab-3').prop('disabled', false);
                        $('#pills-order-tab-3').trigger('click');
                    } else {
                        alert('Your cart is empty')
                    }
                    // $('.timeslots-holder').append(response.view)
                },
                error: function (data) {
                },
                complete: function () {
                }
            });
        });

        $(document).on('click', '#go-to-cart-from-modal', function (e) {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: $(this).data('url'),
                data: {
                    "_token": $('[name=csrf-token]').attr('content'),
                },
                beforeSend: function () {
                },
                success: function (response) {
                    if (response.success) {
                        $('#pills-order-step-3').html(response.view);
                        checkSession();
                        $('#pills-order-tab-3').prop('disabled', false);
                        $('#pills-order-tab-3').trigger('click');
                        $('#goToCartModal').modal('hide')
                    } else {
                        alert('Your cart is empty')
                    }
                    // $('.timeslots-holder').append(response.view)
                },
                error: function (data) {
                },
                complete: function () {
                }
            });
        });

        function checkSession() {
            if ($('.order-summary-section-button').length) {
                $.ajax({
                    dataType: "json",
                    type: "POST",
                    url: $('.order-summary-section-button').data('url'),
                    data: {
                        "_token": $('[name=csrf-token]').attr('content'),
                    },
                    beforeSend: function () {
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#pills-order-step-3').html(response.view);
                        } else {
                            $('#pills-order-tab-3').prop('disabled', true);
                        }
                    },
                    error: function (data) {
                    },
                    complete: function () {
                    }
                });
            }
        }

        $(document).on('click', '.newDogRecipes', function (e) {
            $.ajax({
                dataType: "json",
                type: "GET",
                url: "order/dogs/" + dogId,
                data: {},
                beforeSend: function () {
                },
                success: function (response) {
                    // $('.dogs-holder').html().remove();
                    $('.dogs-holder').html(response.view);
                },
                error: function (data) {
                },
                complete: function () {
                }
            });
        })

        $(document).on('click', '.del-order-item', function () {
            $.ajax({
                dataType: "json",
                type: "POST",
                url: $(this).data('url'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    checkSession();
                    $('#dfSuccessfullyRemovedItemFromCart').modal('show')
                    if (response.itemsInCart === 0) {
                        $('.top-cart-notification').addClass('d-none')

                    } else {
                        $('.top-cart-notification').removeClass('d-none')
                        $('.top-cart-notification').html(response.itemsInCart)
                    }
                },
            });

            // $(this).parents().eq(2).next().remove()
            // $(this).parents().eq(2).remove();
        });

        $(document).on('click', '.proceed-to-checkout-js', function () {
            let imgEl = $('.img-dynamic-order-step')
            $('#pills-order-tab-4').prop('disabled', false);
            $('#pills-order-tab-4').trigger('click');
            imgEl.attr('src', imgEl.attr('src').replace('step3.svg', 'step4.svg'))
            ajax('POST', $(this).data('url'), '4', function (response) {
                if (response.success === true) {
                    // console.log(response);
                }
            })
        });

        addToFavourites()
        toggleCancelMenu()
        confirmCancelMenu()
        confirmCancelOrder()
        paymentPaypal()

        $(document).on('change', '.radio-payment-type', function () {
            if ($(this).attr('id') === 'paypal-input') {
                $('#paypal-button-container').removeClass('d-none');
                $('.btn-submit-order').addClass('d-none');
            } else {
                $('#paypal-button-container').addClass('d-none');
                $('.btn-submit-order').removeClass('d-none');
            }
        })


        $(document).on('click', '.btn-submit-order', function (e) {
            if (!$('input[name="payment"]').is(':checked')) {
                $('#paymentButtonsNotSelected').modal('show')
                return false;
            }

            if (!$('#agreed_terms').is(':checked')) {
                alert('You must accept terms of service!');
                return false;
            }

            if (!$('#agreed_privacy').is(':checked')) {
                alert('You must agree with the privacy policy!');
                return false;
            }
        })
    }
});

function paymentPaypal() {
    if ($('#paypal-button-container').length) {
        paypal.Buttons({
            createOrder: function (data, actions) {
                let createRoute = $('#paypal-button-container').data('paypal-create'),
                    userId = $('#paypal-button-container').data('user-id');
                return fetch(createRoute, {
                    method: 'post',
                    body: JSON.stringify({
                        'currency_code': "GBP",
                        'user_id': userId,
                        'data': $('#paypal-button-container').parents('form').find(':input').serializeArray()
                    }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json'
                    },
                }).then(function (res) {
                    return res.json();
                }).then(function (orderData) {
                    return orderData.id;
                });
            },
            onClick: function (data, actions) {
                if (!$('#agreed_terms').is(':checked')) {
                    alert('You must accept terms of service!');
                    return false;
                }

                if (!$('#agreed_privacy').is(':checked')) {
                    alert('You must agree with the privacy policy!');
                    return false;
                }
            },
            // Call your server to finalize the transaction
            onApprove: function (data, actions) {
                let captureRoute = $('#paypal-button-container').data('paypal-capture');
                return fetch(captureRoute, {
                    method: 'post',
                    body: JSON.stringify({
                        orderId: data.orderID,
                        payerId: data.payerID,
                        inputs: $('#paypal-button-container').parents('form').find(':input').serializeArray()
                    }),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Content-Type': 'application/json'
                    },
                }).then(function (res) {
                    return res.json();
                }).then(function (orderData) {
                    window.location.href = orderData.redirectUrl;
                });
            }

        }).render('#paypal-button-container');
    }
}

function addToFavourites() {
    $(document).on('click', '.js-favourite-menu', function (e) {
        e.preventDefault()
        e.stopPropagation()

        let recipeId = $(this).data('recipe-id'),
            userId = $(this).data('user-id'),
            petId = $(this).data('pet-id'),
            url = $(this).data('url'),
            data = {
                "recipe_id": recipeId,
                "user_id": userId,
                "pet_id": petId,
            };

        ajax('POST', url, data, function (response) {
            if (response.success === true) {
                if (response.removeRecipe === true) {
                    $('#favourite_menu_' + recipeId + '_' + petId).find('.heart-true').addClass('d-none')
                    $('#favourite_menu_' + recipeId + '_' + petId).find('.heart-false').removeClass('d-none')
                    if ($('.remove-whole-recipe').length) {
                        $('#favourite_menu_' + recipeId + '_' + petId).parents('.cl-to-remove').remove()

                    }
                    $('#dfRemovedMenuToFavourite').modal('show')
                } else {
                    $('#favourite_menu_' + recipeId + '_' + petId).find('.heart-true').removeClass('d-none')
                    $('#favourite_menu_' + recipeId + '_' + petId).find('.heart-false').addClass('d-none')
                    $('#dfAddedMenuToFavourite').modal('show')
                }

            }
        }, function (response) {

        });
    })
}

function toggleCancelMenu() {
    $(document).on('click', '.js-order-cancel-menu', function () {
        if ($(this).text() === 'CANCELLED') {
            $(this).text('CANCEL MENU')
            $(this).css('color', 'rgb(102 39 42)')
            $(this).parent().find('input').first().prop('value', 0)
        } else {
            $(this).text('CANCELLED')
            $(this).css('color', '#BDBDBD')
            $(this).parent().find('input').first().prop('value', 1)
        }
    })
}

function confirmCancelMenu() {
    $(document).on('click', '.confirm-canceled-menus', function (e) {
        e.preventDefault()
        e.stopPropagation()
        let data = $(this).parents('form').serializeArray()

        ajax('POST', $(this).parents('form').attr('action'), data, function (response) {
            if (response.success === true) {
                $('#dfCancelMenu').modal('hide')
                $('#dfOrderSuccessfullyUpdated').modal('show')
            }

        })

    })
}

function confirmCancelOrder() {
    $(document).on('click', '.confirm-canceled-order', function (e) {
        e.preventDefault()
        e.stopPropagation()
        let data = $(this).parents('form').serializeArray()
        ajax('POST', $(this).parents('form').attr('action'), data, function (response) {
            if (response.success === true) {
                $('#dfCancelOrderModal').modal('hide')
                $('#dfOrderSuccessfullyUpdated').modal('show')
            } else {
                $('.class-to-append-to').find('p').remove()
                $('.class-to-append-to').append('<p class="alert-danger">' + response.message + '</p>')
            }

        })

    })
}

function timeslots(area_id, addressId = null) {

    $.ajax({
        dataType: "json",
        type: "GET",
        url: "order/timeslots/" + area_id + "",
        data: {
            'address_id': addressId
        },
        beforeSend: function () {
        },
        success: function (response) {
            $('.timeslot-class').remove()
            $('.timeslots-holder').append(response.view)
        },
        error: function (data) {
        },
        complete: function () {
        }
    });

}
