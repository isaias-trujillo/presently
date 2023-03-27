import "./../../styles/alerts/alert.css"
import "./../../styles/alerts/alert-error.css"

export default function ErrorAlert({message}: {message: string}) {
    return (
        <div className='alert alert-error'>
            <img src="https://cdn-icons-png.flaticon.com/512/3306/3306642.png" alt='error icon'/>
            <p>{message}</p>
        </div>
    )
}