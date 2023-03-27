import {Response} from "../Response";
import {AuthUser} from "./authUser";

type Request = { emailOrCode: string, password: string }

export async function fetchLoginApi({emailOrCode, password}: Request) {
    return fetch("http://localhost/presently-react-php/src/api/routes/auth.php", {
        method: 'post',
        mode: 'cors',
        headers: {'content-type': 'application/json', "Accept": "application/json"},
        body: JSON.stringify({emailOrCode, password})
    }).then(res => res.json())
        .then(res => res as Response<AuthUser>)
}