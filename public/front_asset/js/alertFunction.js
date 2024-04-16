function confirm(confirmCallback, denyCallback)
{
    $.jAlert({'type': 'confirm', 'onConfirm': confirmCallback, 'onDeny': denyCallback});
}

/* Optional Alert shortcuts based on color */
function showAlert(title, msg, theme)
{
    $.jAlert({
        'title': title,
        'content': msg,
        'theme': theme
    });
}

function successAlert(title, msg)
{
    if (typeof msg == 'undefined')
    {
        msg = title;
        title = 'ধন্যবাদ ';
    }

    showAlert(title, msg, 'green');
}

function errorAlert(title, msg)
{
    if (typeof msg == 'undefined')
    {
        msg = title;
        title = 'দুঃখিত';
    }

    showAlert(title, msg, 'red');
}

function infoAlert(title, msg)
{
    if (typeof msg == 'undefined')
    {
        msg = title;
        title = 'Info';
    }

    showAlert(title, msg, 'blue');
}


