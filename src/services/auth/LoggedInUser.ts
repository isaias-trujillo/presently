import {AuthUser} from "../../fetching/auth/fetchLoginApi";
export default function loggedInUser() {
    const loggedInUser = localStorage.getItem("user");
    if (!loggedInUser) {
        return null
    }
    return JSON.parse(loggedInUser) as AuthUser
}