// src/axios.js

import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'http://localhost:8002/api', // Remplace par l'URL de ton API
    headers: {
        'Content-Type': 'application/json',
    },
});

// Méthode GET
export const get = async (endpoint) => {
    console.log("API GET", endpoint)

    try {
        const response = await axiosInstance.get(endpoint);
        console.log("API RES", response.data)
        return response.data;
    } catch (error) {
        console.error("Erreur GET:", error);
        throw error;
    }
};

// Méthode POST
export const post = async (endpoint, data) => {
    console.log("API GET", endpoint, data)

    try {
        const response = await axiosInstance.post(endpoint, data);
        console.log("API RES", response.data)
        return response.data;
    } catch (error) {
        console.error("Erreur POST:", error);
        throw error;
    }
};
