/**
 * Create a table based on JSON and format it as a datatable
 */
function setupTable(data)
{
    let display = document.getElementById(data.target);

    let table = document.createElement('table');

    // Create header
    let header = document.createElement("thead");
    let headerRow = document.createElement("tr");

    for(let i = 0; i < data.header.length; i++)
    {
        let th = document.createElement("th");
        th.appendChild(document.createTextNode(data.header[i]));

        headerRow.appendChild(th);
    }
    header.appendChild(headerRow);

    table.appendChild(header);

    let body = document.createElement('tbody');

    // Create data rows
    for(let i = 0; i < data.rows.length; i++)
    {
        let row = document.createElement("tr");

        for(let j = 0; j < data.rows[i].length; j++)
        {
            let td = document.createElement("td");

            // Check for link column
            if(typeof(data.linkColumn) !== 'undefined')
            {
                if(data.linkColumn === j)
                {
                    let a = document.createElement("a");
                    a.appendChild(document.createTextNode(data.rows[i][j]));

                    $(a).attr("href", data.href + data.refs[i]);

                    td.appendChild(a);
                }
                else
                {
                    let value = "";

                    if(data.rows[i][j] !== null)
                        value = data.rows[i][j];
                    td.appendChild(document.createTextNode(value));
                }
            }
            else
            {
                td.appendChild(document.createTextNode(data.rows[i][j]));
            }

            row.appendChild(td);
        }

        body.appendChild(row);
    }

    table.appendChild(body);

    // Remove loading image
    while(display.firstChild)
        display.removeChild(display.firstChild);

    display.appendChild(table);

    if(typeof(data.sortColumn) == 'undefined')
        data.sortColumn = 0;
    if(typeof(data.sortMethod) == 'undefined')
        data.sortMethod = 'desc';

    let settings = {
            'pageLength': 25,
            'order': [[data.sortColumn, data.sortMethod]],
            'oLanguage': {
                'sSearch': 'Filter:'
            }
        };

    if(typeof(data.checkboxes) !== 'undefined')
    {
        settings.columnDefs = [
            {
                'targets': data.checkboxColumn,
                'checkboxes': {
                    'selectRow': true
                }
            }
        ];

        settings.select = {
            'style': 'multi'
        };
    }

    $(table).DataTable(settings);
}

/**
 * Set up login page
 */
function loginSetup()
{
    let loginWindow = $('#login-window');

    // Add listener to login button
    loginWindow.submit(function () {
        $('#login-button').val("Logging in...");
    });

    // Set login page background
    loginWindow.parent().css('background-image', "url('../media/background.png')");
}

function notificationSetup()
{
    $('#notifications-dismiss').click(function(){$('#notifications').fadeOut()});
}

function navigationSetup()
{
    $('span.nav-item').each(function(i, v){
        $(v).click(function(){

            let dropdown = $(this).next();

            if($(dropdown).css('visibility') === "visible")
            {
                $(dropdown).css('visibility', 'hidden');
                $(dropdown).css('opacity', '0');
            }
            else
            {
                $(dropdown).css('visibility', 'visible');
                $(dropdown).css('opacity', '1');
            }
        })
    });
}

/**
 * Initialize date pickers
 */
function datePickerSetup()
{
    $('.date-input').datepicker({dateFormat: 'yy-mm-dd'});
}

/**
 * Filters a result table list
 * @param input The input field
 */
function filterTableList(input)
{
    // Get the input from the filter field
    let filter = input.value.toUpperCase();

    // Get the table immediately following the filter
    let table = input.nextElementSibling;
    let rows = table.getElementsByTagName("tr");

    for(let i = 0; i < rows.length; i++)
    {
        // Get second cell (after edit link)
        let cell = rows[i].getElementsByTagName("td")[1];

        if(cell)
        {
            if(cell.innerHTML.toUpperCase().indexOf(filter) > -1)
            {
                rows[i].style.display = "";
            }
            else
            {
                rows[i].style.display = "none";
            }
        }
    }
}

/**
 * Initialize any table filters
 */
function tableFilterSetup()
{
    $('.list-table-filter').keyup(function(){
        filterTableList(this);
    });
}

/**
 * Add veil effect to buttons
 */
function buttonSetup()
{
    $('.button').click(function(){
        veil();
    });
}

/**
 * Add listener to form submit buttons
 */
function formSubmitButtonSetup()
{
    $('.form-submit-button').click(function(){
        $('#' + $(this).attr('id') + '-form').submit();
    })
}

/**
 * Veil the screen
 */
function veil()
{
    $('#veil').show();
}

/**
 * Un-veil the screen
 */
function unveil()
{
    $('#veil').hide();
}

/**
 * Add confirm alert to all confirm-buttons
 */
function confirmButtonSetup()
{
    $('.confirm-button').click(function(e){
        if(!confirm('Are you sure?'))
        {
            e.preventDefault();
            window.location.reload();
        }
    });
}

/**
 * Set up any TinyMCE textareas
 */
function tinymceSetup()
{
    tinymce.init({
        selector: 'textarea#content-editor',
        height: 500,
        plugins: "code image lists link textcolor table",
        toolbar: "formatselect | bold italic | alignleft aligncenter alignright alignjustify | numlist bullist outdent indent | link image | forecolor backcolor | table"
    });
}

/**
 * Perform a call to InfoCentral though the proxy page
 * @param type "GET"
 * @param path
 * @param data
 * @param base64
 * @returns {*|*|*|*}
 */
function apiRequest(type, path, data, base64 = false)
{
    switch(type)
    {
        case 'DELETE':
            type = 'DELETE';
            break;
        case 'PUT':
            type = 'PUT';
            break;
        case 'POST':
            type = 'POST';
            break;
        default:
            type = 'GET';
            break;
    }

    if(!base64)
        data = window.btoa(JSON.stringify(data));

    let result = $.ajax({
        type: type,
        url: baseURI + '!api-request?requestType=' + type + "&path=" + path + "&body=" + data,
        dataType: 'json',
        cache: false,
        async: true
    });

    if(result.code === 500)
    {
        showNotifications('error', ['The API request did not produce a valid response']);
        unveil();
    }

    return result;
}

/**
 *
 * @param name
 * @param data
 */
function setSearchCookie(name, data)
{
    document.cookie = "ML_" + name + "=" + window.btoa(JSON.stringify(data));
}

/**
 * Returns the value of the cookie with the specified name
 * @param name
 * @returns {string}
 */
function getCookie(name)
{
    name = "ML_" + name + "=";
    let decodedCookie = decodeURIComponent(document.cookie);

    let cookies = decodedCookie.split(';');

    for(let i = 0; i < cookies.length; i++)
    {
        let cookie = cookies[i];

        while(cookie.charAt(0) === ' ')
        {
            cookie = cookie.substring(1);
        }

        if(cookie.indexOf(name) === 0)
        {
            return cookie.substring(name.length, cookie.length);
        }
    }

    return "";
}

/**
 * Removes all cookies except those starting with 'ML_', which are used to save past search history/actions
 */
function clearCookies()
{
    let cookies = document.cookie.split(";");

    for(let i = 0; i < cookies.length; i++)
    {
        let equals = cookies[i].indexOf("=");
        let name = equals > -1 ? cookies[i].substr(0, equals) : cookies[i];

        if(name.indexOf("ML_") !== -1)
        {
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }

    showNotifications('notice', ['Session cache has been cleared']);
}

/**
 * Requests user's current notification count
 */
function loadUnreadNotificationCount()
{
    let unreadCount = document.querySelector("#unreadNotificationCount");

    // Make sure it exists
    if(unreadCount == null)
        return;

    // Remove existing contents
    while(unreadCount.firstChild)
    {
        unreadCount.removeChild(unreadCount.firstChild);
    }

    let loadingImage = document.createElement("img");
    $(loadingImage).attr('src', '../media/animations/ajax.gif');
    $(loadingImage).attr('alt', '');

    unreadCount.appendChild(loadingImage);

    apiRequest("GET", "currentUser/unreadNotificationCount", {}).done(function(json){
        if(json.data.length !== 0)
        {
            // Remove loading animation
            unreadCount.removeChild(unreadCount.firstChild);
            unreadCount.appendChild(document.createTextNode(json.data.count));
        }
    });
}

/**
 *
 */
function setupLoadingImage()
{
    $('.wait').each(function(i,v){

        let loadingImage = document.createElement("img");
        $(loadingImage).attr('src', baseURI + 'media/animations/wait.gif');
        $(loadingImage).attr('alt', '');
        v.appendChild(loadingImage);

    });
}

/**
 * Set up the additional fields button for large search forms
 */
function setupSearchAdditionalFields()
{
    $('.search-additional-field-toggle').click(function(e){
        let additionalFields = $(this).parent().parent().find('.additional-fields');

        $.each(additionalFields, function(i, item)
        {
            if($(item).is(':hidden'))
            {
                $(item).show();
                $(e.target).html("Show Less");
            }
            else
            {
                $(item).hide();
                $(e.target).html("Show More");
            }
        });
    });
}

function setupBackButtons()
{
    $('.back-button').click(function(){window.location.href='..';});
}

function setupExpandableRegions()
{
    // Add listeners to region expand buttons
    $('.region-expand').click(function(e){
        if($(this).hasClass("region-expand-collapsed"))
        {
            // Change indicator
            $(this).addClass("region-expand-expanded");
            $(this).removeClass("region-expand-collapsed");

            // Show region
            $(this).next().show();
        }
        else
        {
            $(this).removeClass("region-expand-expanded");
            $(this).addClass("region-expand-collapsed");

            $(this).next().hide();
        }
    });
}

/**
 * Generate notifications/errors as if they had been added in template/URL
 * @param type
 * @param items
 */
function showNotifications(type, items)
{
    // Remove existing notifications
    let notifications = document.getElementById("notifications");

    if(notifications !== null)
    {
        notifications.remove();
    }

    notifications = document.createElement("div");
    notifications.id = "notifications";

    // Add type class
    switch(type)
    {
        case "error":
            $(notifications).addClass("notifications-error");
            break;
        default:
            $(notifications).addClass("notifications-notice");
    }

    // Add dismiss button
    let dismissButton = document.createElement("div");
    dismissButton.id = "notifications-dismiss";
    dismissButton.appendChild(document.createTextNode("X"));
    notifications.appendChild(dismissButton);

    // Add heading
    let heading = document.createElement("h3");
    let icon = document.createElement("img");
    $(icon).attr("alt", "");

    let title = "Notice";

    switch(type)
    {
        case "error":
            $(icon).attr("src", baseURI + "media/icons/error.png");
            title = "Error";
            break;
        default:
            $(icon).attr("src", baseURI + "media/icons/about.png");
    }

    heading.appendChild(icon);
    heading.appendChild(document.createTextNode(title));
    notifications.appendChild(heading);

    // Add notifications
    let notificationList = document.createElement("ul");

    $(items).each(function(i, v){
        let notification = document.createElement("li");
        notification.appendChild(document.createTextNode(v));
        notificationList.appendChild(notification);
    });

    notifications.appendChild(notificationList);

    // Add to 'view'
    document.getElementById("view").appendChild(notifications);

    // Show
    $(notifications).fadeIn();
    notificationSetup();
    unveil();
}

/**
 * Setup document
 */
$(document).ready(function(){
    loginSetup();
    notificationSetup();
    tableFilterSetup();
    formSubmitButtonSetup();
    confirmButtonSetup();
    buttonSetup();
    datePickerSetup();
    tinymceSetup();
    setupSearchAdditionalFields();
    setupBackButtons();
    setupExpandableRegions();
    //navigationSetup();

    setupLoadingImage();

    loadUnreadNotificationCount();
    // setInterval(loadUnreadNotificationCount, 30000);

    // Fade in notifications if they are present
    $('#notifications').fadeIn();
});