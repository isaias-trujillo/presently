import {Response} from "../Response";
import Student from "./Student";

export async function fetchGetAllStudents() {
    return fetch("http://localhost/presently-react-php/src/api/routes/students.php", {
        method: 'get',
        mode: 'cors',
        headers: {'content-type': 'application/json', "Accept": "application/json"},
    }).then(res => res.json())
        .then(res => res as Response<Student>[])
        .then(res => res as Student[])
}