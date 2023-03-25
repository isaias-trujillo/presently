import {AuthUser} from "../../fetching/auth/fetchLoginApi";

export default function isAuthorized(user: AuthUser | null, rol: number) {
    if (!user) {
        return false;
    }
    return user.rol === rol;

}