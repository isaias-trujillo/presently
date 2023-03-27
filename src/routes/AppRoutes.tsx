import {BrowserRouter, Route, Routes} from "react-router-dom";
import LoginPage from "../pages/LoginPage";
import AdminStudentPage from "../pages/admin/AdminStudentPage";
import ProtectedRoutes from "./ProtectedRoutes";
import AdminCoursesPage from "../pages/admin/AdminCoursesPage";
import AdminTeachersPage from "../pages/admin/AdminTeachersPage";
import AdminGroupsPage from "../pages/admin/AdminGroupsPage";

export const AppRoutes = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<LoginPage/>}></Route>
                <Route path='admin' element={<ProtectedRoutes rolId={1}/>}>
                    <Route path='courses' element={<AdminCoursesPage/>}></Route>
                    <Route path='teachers' element={<AdminTeachersPage/>}></Route>
                    <Route path='groups' element={<AdminGroupsPage/>}></Route>
                    <Route path='students' element={<AdminStudentPage/>}></Route>
                </Route>
                <Route path='teacher' element={<ProtectedRoutes rolId={2}/>}>
                    <Route path='groups' element={<h1>Teacher: groups page</h1>}></Route>
                    <Route path='reports' element={<h1>Teacher: reports page</h1>}></Route>
                </Route>
            </Routes>
        </BrowserRouter>
    )
}

export default AppRoutes;