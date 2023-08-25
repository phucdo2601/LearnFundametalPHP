import { BasicCallApi } from "../baseUrl"

const getAllStudents = async () => {
    return await BasicCallApi().get(`students`);
}

const StudentApi = {
    getAllStudents
};

export default StudentApi;