import { getTeams, logout } from "./endpoints-team.js";
import { drawTable } from "./table-teams.js";
let search = document.getElementById('search');
let buttonLogout = document.getElementById('button-logout')

if(search!=null) {
    search.onkeyup = async function() {
        const teams = await getTeams(search.value)

        if(teams != null) {

            const { data } = teams.data
            drawTable(data)

        }

    }
}

buttonLogout.onclick = function() {
    logout()
}



window.addEventListener('load', async function(){

    const teams = await getTeams()

    const { data } = teams.data;
    drawTable(data)

})
