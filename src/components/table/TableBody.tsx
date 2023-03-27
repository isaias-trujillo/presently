import {Cell, DataCell} from "./Table";

type Props = {
    data: DataCell[],
    actions?: Cell[]
}

export default function TableBody({data, actions} : Props) {
    return (
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
    )
}