import {BrowserRouter, Route, Routes} from "react-router-dom";
import LoginPage from "../pages/LoginPage";
import Students from "../pages/admin/Students";
import ProtectedRoutes from "./ProtectedRoutes";

export const AppRoutes = () => {
    return (
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<LoginPage/>}></Route>
                <Route path='admin' element={<ProtectedRoutes rolId={1}/>}>
                    <Route path='courses' element={<h1>Admin page: courses</h1>}></Route>
                    <Route path='students' element={<Students/>}></Route>
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