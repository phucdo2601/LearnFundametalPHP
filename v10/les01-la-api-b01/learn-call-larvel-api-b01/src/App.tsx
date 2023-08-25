import { useEffect, useState } from "react";
import "./App.css";
import { ListStudentResModel } from "./models/response/Student/ListStudentResModel";
import StudentApi from "./api/students/StudentApi";
import { StudentModel } from "./models/base/StudentModel";

function App() {
  const [listStudent, setListStudent] = useState<StudentModel[]>([]);

  useEffect(() => {
    const getAllStudents = async () => {
      StudentApi.getAllStudents().then((res: any) => {
        console.log(res.data);
        setListStudent(res.data.students);
      });
    };

    getAllStudents();
  }, []);

  return (
    <>
      <div>
        {listStudent.map((student) => (
          <>
            <h1>{student.course}</h1>
          </>
        ))}
      </div>
    </>
  );
}

export default App;
