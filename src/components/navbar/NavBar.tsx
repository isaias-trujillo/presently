import LinkMenu from "./menus/LinkMenu";
import {onLogout} from "../../services/auth/onLogout";
import {useNavigate} from "react-router-dom";
import Menu from "./menus/Menu";
import "./../../styles/navbar/navbar.css"

interface Props {
    lastname?: string
    firstname?: string
    menus: Menu[],
}

export default function NavBar({lastname = 'Tomas', firstname = 'John', menus}: Props) {

    const navigate = useNavigate();
    const onClick = () => {
        onLogout();
        navigate('/')
    }

    return (
        <nav id={'navbar'}>
            <header>
                <span>{lastname} </span>
                <span>{firstname}</span>
            </header>
            <ul>
                {
                    menus.map((menu, index) => (
                        <li key={index}>
                            <LinkMenu props={menu}></LinkMenu>
                        </li>
                    ))
                }
            </ul>
            <button className={'button-large-dark'} type={'button'} onClick={onClick}>Logout</button>
        </nav>
    )
}