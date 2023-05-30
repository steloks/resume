import flatpickr from 'flatpickr';
import ajax from './ajax';
import Dropzone from 'dropzone';

require("flatpickr/dist/themes/airbnb.css");
require("dropzone/src/dropzone.scss");

$(document).ready(function () {
    loadCalendar()
    loadDropzone()
    storePetFirstStep()
    storePetSecondStep()
    storePetThirdStep()
    updatePetFirstStep()
    updatePetSecondStep()
    updatePetThirdStep()
    setPetAge()
    unusualBehaviour()
    checkUBModal()
    checkDiseaseModal()
});

function loadCalendar() {
    flatpickr($('[name=date_of_birth]'), {
        altInput: false,
        clickOpens: true,
        theme: 'airbnb',
        locale: {
            "firstDayOfWeek": 1 // start week on Monday
        },
        dateFormat: "d-m-Y",
    });
}

function storePetFirstStep() {
    changeStep('.df-first-step')
}

function storePetSecondStep() {
    changeStep('.df-second-step')
}

function storePetThirdStep() {
    changeStep('.df-third-step', 1)
}

function updatePetFirstStep() {
    changeStep('.df-first-update-step')
}

function updatePetSecondStep() {
    changeStep('.df-second-update-step')
}

function updatePetThirdStep() {
    changeStep('.df-third-update-step', 1)
}

function changeStep(clickClass, redirectToPage = null) {
    $(document).on('click', clickClass, function (e) {
        e.preventDefault()

        let form = $(this).parents('form');
        let image = addImage(form)
        let disabled = form.find(':input:disabled').removeAttr('disabled');
        let data = form.serializeArray();
        disabled.attr('disabled','disabled');
        data.push({name: 'image', value: image});
        ajax('POST', form.attr('action'), data, function (response) {
            if (response.success === true) {
                if ($(redirectToPage).length) {
                    window.location.href = response.route;
                } else {
                    form.parent().parent().html(response.view)
                }
            }
        }, function (response) {
            $.each(response.responseJSON.errors, function (key, value) {
                let error = '<span class="invalid-feedback">' + value + '</span>',
                    element = $('[name=' + key + ']')
                //todo think how to do without timeout
                removeErrors(form)
                setTimeout(function () {
                    element.addClass('is-invalid')
                    element.parent().append(error);
                }, 350)
            })
        });

        return false;
    })
}

/**
 *
 * @param inputs
 */
function removeErrors(inputs) {
    $(inputs).find('.invalid-feedback').remove()
    $(inputs.serializeArray()).each(function (key, value) {
        if (value.name !== '_token') {
            $('[name=' + value.name + ']').removeClass('is-invalid');
        }
    })
}

function loadDropzone() {
    let el = $('div#df_dropzone');
    if (el.length) {
        let myDropZone = new Dropzone('div#df_dropzone', {
            url: el.parents('form').attr('action'),
            paramName: 'image',
            thumbnailWidth: 150,
            thumbnailHeight: 150,
            acceptedFiles: "image/jpeg,image/png,image/jpg",
            maxFiles: 1,
            autoProcessQueue: false,
            maxfilesexceeded: function (file) {
                this.removeAllFiles();
                this.addFile(file);
            }
        });

        myDropZone.on('addedfile', function (file) {
            $('.dz-progress').hide();
            file.previewElement.addEventListener("click", function () {
                myDropZone.removeFile(file);
            });
        });

        $(document).on('click', '.df-change-img', function (e) {
            $('div#df_dropzone').trigger('click')
        })

        $(document).on('click', '.df-delete-img', function (e) {
            if ($(this).parent().find('.dropzone-area').find('.dz-image').length) {
                $(this).parent().find('.dropzone-area').find('.dz-image').remove()
            }
            $(this).parent().find('.dropzone-area').find('.dz-image-preview').trigger('click')
        })
    }
}

function addImage(selector) {
    let el = $(selector),
        elUpdate = el.find('.dz-image > img');
    if (el.find('.dz-image-preview > div.dz-image').length) {
        return el.find('.dz-image-preview > div.dz-image > img').attr('src');
    }
    if (elUpdate.length) {
        return elUpdate.attr('src')
    }
}

function setPetAge() {
    $(document).on('change', '#date_of_birth', function (e) {
        let dob = new Date((flatpickr).parseDate($(this).val()));
        let today = new Date();
        let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        let month = today.getMonth() - dob.getMonth();
        $('#age').val(age + '.' + month);
    })
}

function unusualBehaviour() {
    $(document).on('click', '.js-toggle-ub-modal', function () {
        $('#dfExplanationUnusualBehaviour').modal('show')
    })
}

function checkUBModal() {
    $(document).on('change', '.js-check-ub', function () {
        if ($(this).val() === '1') {
            $('#dfConsentUnusualBehavior').modal('show')
        }

    })
}

function checkDiseaseModal() {
    $(document).on('change', '.js-check-disease', function () {
        if ($(this).val() === '1') {
            $('#dfConsentDiseases').modal('show')
        }
    })
}
