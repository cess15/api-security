export default function printTable(object) {
    return `
        <tr>
            <td>${object.name}</td>
            <td>${object.description}</td>
            <td>${object.price}</td>
        </tr>
    `;
}
