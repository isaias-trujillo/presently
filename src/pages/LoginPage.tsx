import LoginForm from "../components/form/LoginForm";
import {useEffect, useState} from "react";
import loggedInUser from "../services/auth/LoggedInUser";
import onRedirect from "../services/auth/onRedirect";
import {Navigate} from "react-router-dom";
import {AuthUser} from "../fetching/auth/authUser";

export default function LoginPage() {
    const [user, setUser] = useState<AuthUser | null>(null);
    useEffect(() => {
        const currentUser = loggedInUser();
        if (currentUser) {
            setUser(() => currentUser)
        }
    }, [])
    if (user) {
        const path = onRedirect(user)
        return <Navigate to={path}/>
    }
    return <LoginForm/>
}