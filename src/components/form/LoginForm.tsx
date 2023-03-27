import {useRef, useState} from "react";
import {useNavigate} from "react-router-dom";

import "../../styles/layouts/login-container.css"
import "../../styles/forms/login-form-title.css"
import "../../styles/textfields/login-text-field.css"
import "../../styles/buttons/button-large.css"

import onLogin from "../../services/auth/onLogin";
import ErrorAlert from "../alerts/ErrorAlert";

export default function LoginForm() {
    const emailOrCode = useRef<HTMLInputElement | null>(null);
    const password = useRef<HTMLInputElement | null>(null);
    const [error, setError] = useState("");
    const navigate = useNavigate();

    const onSubmit = () => onLogin({
        emailOrCode: emailOrCode.current?.value,
        password: password.current?.value,
        setError,
        navigate
    })

    return (
        <div id="login-container">
            <header>
                <h1 id='login-form-title'>Login</h1>
            </header>
            <form>
                <label className='login-text-field'>
                    Correo o código
                    <input type='email' placeholder={'Ingresa tu correo o código'} ref={emailOrCode} id='email'/>
                </label>
                <label className='login-text-field'>
                    Contraseña
                    <input type='password' placeholder={'Ingresa tu contraseña'} ref={password} id='password'/>
                </label>
                <button className='button-large-dark glow-on-hover' type='button' onClick={onSubmit}>Ingresar</button>
                {
                    error && <ErrorAlert message={error}/>
                }
            </form>
        </div>
    )
}
