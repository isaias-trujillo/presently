import menus from "../../config/menus";
import NavBar from "../../components/navbar/NavBar";
import "./../../styles/layouts/platform-container.css"
import {useEffect, useState} from "react";
import Student from "../../fetching/students/Student";
import TableOptions from "../../components/table/TableOptions";
import onSearchStudents from "../../services/students/onSearchStudents";
import Loading from "../../components/Loading";
import Table from "../../components/table/Table";
import Pagination from "../../components/pagination/Pagination";

export default function AdminStudentPage() {
    const [students, setStudents] = useState<Student[]>([])
    const [records, setRecords] = useState<Student[]>([])
    const [loading, setLoading] = useState<boolean>(false)

    const onSearch = (query: string = "") => onSearchStudents({query, setLoading, setStudents})
    const onPageChange = (page: number, perPage: number) => {
        setRecords(() => students.slice((page - 1) * perPage, page * perPage))
    }

    useEffect(() => {
        onSearch()
    }, [])

    const columns = [
        'ID',
        'Apellido paterno',
        'Apellido materno',
        'Nombres',
        'DNI',
        'Correo',
    ];

    const links = menus['admin']

    return (
        <div id={'platform-container'}>
            <NavBar menus={links}/>
            <div id={'main-content'}>
                <TableOptions name={'Estudiantes'} onSearch={onSearch}/>
                <div className={'info'}>
                    <span>Total: {students.length ?? 0}</span>
                </div>
                {
                    loading ? (<Loading/>) : (
                        <>
                            <Table columns={columns} data={records}/>
                            <Pagination total={students.length ?? 1} perPage={10} onPageChange={onPageChange}/>
                        </>
                    )
                }
            </div>
        </div>
    )
}