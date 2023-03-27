import "../../styles/pagination.css"

import {useEffect, useState} from "react";
import {toFirstPage, leftPage, rightPage, toLastPage} from "./changePage";
import PageButton from "./PageButton";

interface Props {
    total: number,
    perPage: number,
    onPageChange: (page: number, perPage: number) => void
}

export default function Pagination({total, perPage, onPageChange}: Props) {
    const [page, setPage] = useState(1)
    const lastPage = total === 0  ? 1 : Math.ceil(total / perPage);

    useEffect(() => {
        onPageChange(page, perPage)
    }, [page])

    return (
        <div className={'pagination'}>
            <PageButton icon={'first_page'} disable={page === 1} onClick={() => toFirstPage(page, setPage)}/>
            <PageButton icon={'chevron_left'} disable={page === 1} onClick={() => leftPage(page, setPage)}/>
            <div>
                <span>Página {page} / {lastPage}</span>
            </div>
            <PageButton icon={'chevron_right'} disable={page === lastPage} onClick={() => rightPage(page, lastPage, setPage)}/>
            <PageButton icon={'last_page'} disable={page === lastPage} onClick={() => toLastPage(page, lastPage, setPage)}/>
        </div>
    )
}