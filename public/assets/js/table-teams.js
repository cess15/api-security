import templateTeams from "./template-teams.js";

let tbody = document.getElementById('tbody-teams');

export function drawTable(data) {
    tbody.innerHTML = ''

    data.map( team => {
        tbody.insertAdjacentHTML('beforeend', templateTeams(team))
    })
}
