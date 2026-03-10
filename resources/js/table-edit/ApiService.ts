// js/table-edit/AxiosService.ts
import axios from 'axios';

export class ApiService {
    private baseUrl: string;

    // Constructeur avec baseUrl
    constructor(baseUrl: string) {
        this.baseUrl = `${baseUrl}/table-edit`;
    }

    // Méthode GET
    async get(endpoint: string) {
        try {
            const response = await axios.get(`${this.baseUrl}/${endpoint}`);
            return response.data;
        } catch (error) {
            console.error("Error during GET request:", error);
            throw error;
        }
    }

    // Méthode POST
    post(endpoint: string, data: object) {
        console.log(`${this.baseUrl}/${endpoint}`, data)
        return axios.post(`${this.baseUrl}/${endpoint}`, data)
            .then(response => response.data)
            .catch(error => {
                console.error("Error during POST request:", error);
                throw error;
            });
    }
}
