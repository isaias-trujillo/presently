import menus from "../../config/menus";
import NavBar from "../../components/navbar/NavBar";
import "./../../styles/layouts/platform-container.css"

export default function AdminCoursesPage() {
    const links = menus['admin']
    return (
        <div id={'platform-container'}>
            <NavBar menus={links}/>
            <div>
                Admin: courses page
            </div>
        </div>
    )
}