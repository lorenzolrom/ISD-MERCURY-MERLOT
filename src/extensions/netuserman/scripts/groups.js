function getSearchForm()
{
    let cn = document.getElementById('cn').value;
    let description = document.getElementById('description').value;

    return {
        cn: cn,
        description: description
    };
}


function getForm()
{
    let description = document.getElementById('description').value;
    let distinguishedname = document.getElementById('distinguishedname').value;

    return {
        distinguishedname: distinguishedname,
        description: description
    };
}

function search()
{
    apiRequest('POST', 'netgroupman/search', getSearchForm()).done(function(json){
        if(json.code === 200)
        {
            let rows = [];
            let refs = [];

            $.each(json.data, function(i, v){

                let dnParts = v.distinguishedname.split(',');
                dnParts.shift();

                let folder = '';
                let dc = '';

                for(let i = 0; i < dnParts.length; i++)
                {
                    let dnPart = dnParts[i].split('=');

                    if(dnPart[0] === "DC")
                        dc += dnPart[1] + '.';
                    else
                        folder = dnPart[1] + '/' + folder;

                }

                dc = dc.replace(/\.+$/,''); // Remove trailing dot in DC

                folder = folder.replace(/\/+$/,''); // Remove trailing slash in folder

                refs.push(v.cn);
                rows.push([
                    v.cn,
                    dc + '/' + folder,
                    v.description
                ]);
            });

            $('#results').mlTable({
                header: ['Name', 'Folder', 'Description'],
                linkColumn: 0,
                href: baseURI + 'netuserman/viewgroup/',
                refs: refs,
                rows: rows,
                sortMethod: 'asc'
            });
        }

        unveil();
    });

    return false;
}

function updateGroup(cn)
{
    apiRequest('PUT', 'netgroupman/' + cn, getForm()).done(
        function(json)
        {
            if(json.code === 204)
                window.location.replace(baseURI + 'netuserman/viewgroup/' + cn + '?SUCCESS=Group updated');
        }
    );

    return false;
}