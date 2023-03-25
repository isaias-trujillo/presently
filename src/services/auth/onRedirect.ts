import {AuthUser} from "../../fetching/auth/fetchLoginApi";

export default function onRedirect(user: AuthUser | null) {
    if (!user) {
        return '/'
    }
    switch (user.rol) {
        case 1:
            return '/admin/students'
        case 2:
            return '/teacher/groups'
        default:
            return '/'
    }
}