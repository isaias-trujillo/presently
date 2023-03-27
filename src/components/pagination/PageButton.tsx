import "./../../styles/buttons/icon-button.css"

interface Props {
    icon: string
    disable: boolean,
    onClick: () => void
}

export default function PageButton({icon, disable, onClick} : Props) {
    return (
        <button
            className={'icon-button'}
            type={'button'}
            disabled={disable}
            onClick={onClick}>
                <span className="material-symbols-outlined">
                    {icon}
                </span>
        </button>
    )
}