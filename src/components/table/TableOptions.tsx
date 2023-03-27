import "../../styles/tables/table-options.css";
import SearchBar from "../SearchBar";

interface Props {
    name: string,
    onSearch: (query : string) => void,
    addRecord?: JSX.Element
}

export default function TableOptions({name, onSearch,addRecord = undefined}: Props) {
    return (
        <div className={'table-options'}>
            <span className={'title'}>{name}</span>
            <SearchBar onSearch={onSearch}/>
            {
                addRecord
            }
        </div>
    )
}