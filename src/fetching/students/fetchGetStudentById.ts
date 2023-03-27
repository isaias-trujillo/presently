import {Response} from "../Response";
import Student from "./Student";

type Request = { id: string }

export async function fetchGetStudentById({id}: Request) {
    return fetch(`http://localhost/presently-react-php/src/api/routes/students.php?id=${id}`, {
        method: 'get',
        mode: 'cors',
        headers: {'content-type': 'application/json', "Accept": "application/json"},
    }).then(res => res.json())
        .then(res => res as Response<Student>)
}