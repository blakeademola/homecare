$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.selectpicker').selectpicker();

    $("[data-toggle='datepicker']").attr('readonly', true).datepicker();

    $('[data-toggle="tooltip"]').click(function () {
        $(this).tooltip('toggle');
    });

    $("[data-type='currency']").each(function () {
        formatCurrency($(this));
    })
});

$(".ui-toggle").click(function(){
    $(".ui-rotate").toggleClass("down");
});

function notify(type, msg) {
    new Noty({
        type: type,
        layout: 'bottomLeft',
        text: msg,
        theme: 'metroui',
        timeout: 3000
    }).show();

}

function alert (message, defaultAlert = false) {

    if (defaultAlert) {
        window.alert(message);
    }

    let alertModal = $('#alert-modal');

    alertModal.find('.modal-body').empty().html(message);
    alertModal.modal('show');
    alertModal.find("button[data-dismiss='modal']").focus();
}

setTimeout(function () {
    $('.noty_body').click();
}, 5000);
