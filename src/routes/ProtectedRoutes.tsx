import {Navigate, Outlet} from "react-router-dom";
import onRedirect from "../services/auth/onRedirect";
import loggedInUser from "../services/auth/LoggedInUser";
import {onLogout} from "../services/auth/onLogout";

interface Props {
    rolId: number
}

export default function ProtectedRoutes({rolId}: Props) {
    const user = loggedInUser();
    const logged = user != null;
    const path = onRedirect(user);
    if (!logged) {
        onLogout()
        return <Navigate to={path}/>
    }
    const isAuthorized = user?.rol === rolId;
    if (!isAuthorized) {
        return <Navigate to={path}/>
    }
    return <Outlet/>
}