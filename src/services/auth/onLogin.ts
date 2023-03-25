import {Dispatch} from "react";
import {fetchLoginApi} from "../../fetching/auth/fetchLoginApi";
import onRedirect from "./onRedirect";
import {NavigateFunction} from "react-router-dom";


type Props = {
    emailOrCode?: string,
    password?: string,
    setError: Dispatch<string>,
    navigate: NavigateFunction
}

export default async function onLogin({emailOrCode, password, setError ,navigate}: Props) {

    if (!emailOrCode || emailOrCode.trim().length === 0) {
        setError("Correo o código vacío")
        return;
    }

    if (!password || password.trim().length === 0) {
        setError("Contraseña vacía")
        return;
    }

    fetchLoginApi({emailOrCode, password})
        .then(response => {
            if ('error' in response) {
                setError(response['error'])
                return
            }
            localStorage.setItem('user', JSON.stringify(response))
            const path = onRedirect(response)
            navigate(path);
        })
        .catch(err => console.log(`Error: ${err}`))
}