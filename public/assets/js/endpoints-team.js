export const getTeams = async (search = '', page = 1) => {
    let teams = await fetch(`/api/teams?page=${page}&name=${search}`, {
        headers: {
            "Accept" : "application/json",
            "Authorization" : `Bearer ${localStorage.getItem('token')}`
        }
    })

    let data = await teams.json();
    return data;
}

export const logout = () => {

    fetch(`/api/logout`, {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json',
            'Accept' : 'application/json',
            'Authorization' : `Bearer ${localStorage.getItem('token')}`
        },
    }).then(res => {
        if(res.status == 202 ) {
            localStorage.removeItem('token')
        }
        return res
    }).then(response => {
        if(response.status != 202) {
            response.json().then(json => {
                console.log(json)
            })
        }else {
            response.json().then(json => {
                console.log(json.message);
                localStorage.removeItem('token')
            })
        }
    }).catch( error => console.log(error))
}
