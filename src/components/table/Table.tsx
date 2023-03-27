import TableHeader from "./TableHeader";

import "../../styles/tables/table.css";

export type Cell = JSX.Element | string | number | boolean
export type DataCell = Record<string, Cell>

type Props = {
    columns: Cell[],
    data: DataCell[],
    actions?: Cell[]
}

export default function Table({columns, data, actions = []}: Props) {
    const hasActions = actions?.length > 0;

    return (
        <table className={'table'} cellSpacing={0}>
            <TableHeader columns={columns} hasActions={hasActions}/>
            <tbody>
            {
                data && data.map((row, index) => (
                    <tr key={index}>
                        {
                            Object.values(row).map((value, index) => <td key={index}>{value}</td>)
                        }
                    </tr>
                ))
            }
            </tbody>
        </table>
    )
}