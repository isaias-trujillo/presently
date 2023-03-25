import {Dispatch, useRef, useState} from "react";
import onLogin from "../../services/auth/onLogin";
import {Navigate, useNavigate} from "react-router-dom";

export default function LoginForm() {
    const emailOrCode = useRef<HTMLInputElement | null>(null);
    const password = useRef<HTMLInputElement | null>(null);
    const [error, setError] = useState("");
    const navigate = useNavigate();

    return (
        <form>
            <label>
                Correo o código
                <input type='email' placeholder={'Ingresa tu correo o código'} ref={emailOrCode} id='email'/>
            </label>
            <label>
                Contraseña
                <input type='password' placeholder={'Ingresa tu contraseña'} ref={password} id='password'/>
            </label>
            <button type='button' onClick={() => onLogin({
                emailOrCode: emailOrCode.current?.value,
                password: password.current?.value,
                setError,
                navigate
            })}>Login
            </button>
            {
                error && <h1>{error}</h1>
            }
        </form>
    )
}
