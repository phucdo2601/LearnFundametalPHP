import axios from "axios";

const ROOT_HOST_SERVER = 'http://127.0.0.1:8000/';

export const BasicCallApi = () => {
    const instance = axios.create({
        baseURL: ROOT_HOST_SERVER + 'api/',
        timeout: 10000,
    });

    return instance;
}