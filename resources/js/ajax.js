export default async function (method, url, data, callback, eCallback, param = null) {
    $.ajax({
        url: url,
        method: method,
        dataType: 'json',
        beforeSend: function (xhr, type) {
            if (!type.crossDomain) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
            }
        },
        data: data,
        success: function (response) {
            if (callback) {
                callback(response, param)
            }
        },
        error: function (error) {
            if (eCallback) {
                eCallback(error, param)
            }
        },
    })
}
