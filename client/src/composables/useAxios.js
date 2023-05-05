import axios from "axios";

let api;

export function createApi() {
    
    api = axios.create({
        baseURL: process.env.VUE_APP_BASE_URL + "/api/",
        withCredentials: false,
        headers: {
            "Content-type": "application/json",
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
    });
    
    api.interceptors.request.use((config) => {       
      if(localStorage.getItem("isLoggedIn") == "true"){
        config.headers = {
            ...config.headers,
            Authorization: `Bearer ${localStorage.getItem("token")}`, //token based auth
        };
      }
  
        return config;
    });

    return api;
}

export function useAxios() {
    if (!api) {
        createApi();
    }
    return api;
}
