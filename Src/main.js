$(document).ready(function () {
    $(document).on('click', '.editBtn', function (e) {
        var parent = $(this).closest('tr');
        var id = parent ? parent.data('id') : 0;

        if (id) {
            var text = parent.find('.textField').val();
            var status = parent.find('.statusField').val();

            $('.idInput').val(id);
            $('.textInput').val(text);
            $('#status_' + status).attr('checked', true);
        } else {
            alert('Invalid record!');
        }
    });

    $(document).on('submit', '.jsForm', function (e) {
        e.preventDefault();
        var data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: data,
            success: function (res) {
                var parseRes = JSON.parse(res);
                alert(parseRes.msg);
                if (parseRes.success)
                    location.reload();
            }
        });
    });

});