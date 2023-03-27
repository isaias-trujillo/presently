import {Response} from "../Response";
import Student from "./Student";

export async function fetchGetAllStudentsWithWords(word: string) {
    return fetch(`http://localhost/presently-react-php/src/api/routes/students.php?query=${word}`, {
        method: 'get',
        mode: 'cors',
        headers: {'content-type': 'application/json', "Accept": "application/json"},
    }).then(res => res.json())
        .then(res => res as Response<Student>[])
        .then(res => res as Student[])
}