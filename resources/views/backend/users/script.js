$(function () {
    'use-strict';

    $('.edit-user').click(function (e) {
        const userId = this.id;
        $.ajax({
            type: 'POST',
            url: baseUrl + 'admin/user/edit',
            data: {userId: userId},
            success: function (data) {
                const ThisModal = $('#aikaGenerallargeModal');
                blockBody('Please wait...');

                setTimeout(function () {
                    unlockBody();
                    ThisModal.html(data).modal('show');

                    const FormID = $('.editUserForm').attr('id');
                    const Form = $('#' + FormID);
                    Form.validate();
                }, 1000);
            },
            fail: function (error) {
                console.log("An error occured.");
            }
        });

        e.preventDefault();
    });


    const table = $('.datatable-users');

    if (table.length > 0) {
        table.DataTable()
    }
});