import "../styles/search-bar.css";
import {useEffect, useMemo, useRef, useState} from "react";

interface Props {
    onSearch?: (query: string) => void
}

export default function SearchBar({onSearch = (query) => console.log("searching..." + query)}: Props) {

    return (
        <label className={'search-bar'}>
            <span className="material-symbols-outlined">search</span>
            <input type={'search'} placeholder={'Ingresa el término a buscar'} onChange={(event) => onSearch(event.target.value)}/>
        </label>
    )
}