jQuery(document).ready(function () {
   let requiredForm = $('.validateForm');
   if (requiredForm.length > 0) {
       requiredForm.validate();
   }
});

function blockBody(message) {
    return $.blockUI({
        message: `<div style='color: #fff'>${message}</div>`
    });
}

function unlockBody() {
    return $.unblockUI();
}
