let loginUser = document.getElementById('login-user');

loginUser.onclick = function() {
    let form = document.forms['form-login']
    login(form)
}

function login(form) {

    let identification = form['identification'].value
    let password = form['password'].value

    let object = {
        identification : identification,
        password : password
    }


    fetch('http://127.0.0.1:8000/api/login', {
        method: 'POST',
        headers: {
            'Content-Type' : 'application/json',
            'Accept' : 'application/json',
        },
        body: JSON.stringify(object),
    }).then( response => {

        if(response.ok ) {
            console.log(response.statusText)
        }

        return response
    }).then(res => {
        if(res.status == 401) {
            res.json().then(json => {
                console.log(json)
            })
        } else {
            res.json().then(json => {
                console.log(json)
                localStorage.setItem('token', json.token)
            })
        }
    }).catch( error => console.log(error))
}
