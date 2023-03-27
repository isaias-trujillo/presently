import {NavLink} from "react-router-dom";
import Menu from "./Menu";
import "./../../../styles/navbar/navbar-menu.css"

export default function LinkMenu({props} :{props: Menu}) {
    const style = ({isActive}: { isActive: boolean }) => isActive ? 'navbar-active-menu' : 'navbar-menu'
    return (
        <NavLink to={props.path} className={style}>
            <span className="material-symbols-outlined">{props.icon}</span>
            <p>{props.name}</p>
        </NavLink>
    )
}