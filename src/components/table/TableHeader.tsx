import {Cell} from "./Table";

import "../../styles/tables/table-header.css";

interface Props {
    columns: Cell[],
    hasActions?: boolean
}

export default function TableHeader({columns, hasActions = false}: Props) {
    return (
        <thead className={'table-header'}>
        <tr>
            {
                columns && columns.map((column, index) => <th key={index}>{column}</th>)
            }
            {
                hasActions && <th>Actions</th>
            }
        </tr>
        </thead>
    )
}