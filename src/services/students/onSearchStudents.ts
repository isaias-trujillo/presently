import {fetchGetAllStudentsWithWords} from "../../fetching/students/fetchGetAllStudentsWithWords";
import {Dispatch} from "react";
import Student from "../../fetching/students/Student";

interface Props {
    query: string,
    setLoading: Dispatch<boolean>
    setStudents: Dispatch<Student[]>
}

export const onSearch = ({query, setLoading, setStudents} : Props) => {
    setLoading(true)
    fetchGetAllStudentsWithWords(query)
        .then((res) => setStudents(res))
        .finally(() => setLoading(false));
}

export default onSearch