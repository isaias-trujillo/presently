import {AuthUser} from "../../fetching/auth/authUser";
export default function loggedInUser() {
    const loggedInUser = localStorage.getItem("user");
    if (!loggedInUser) {
        return null
    }
    return JSON.parse(loggedInUser) as AuthUser
}