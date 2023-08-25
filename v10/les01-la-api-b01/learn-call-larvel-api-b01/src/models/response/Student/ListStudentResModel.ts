import { StudentModel } from "../../base/StudentModel";

export interface ListStudentResModel {
    status: number;
    students: StudentModel[];
}