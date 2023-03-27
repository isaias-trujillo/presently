import {Dispatch, SetStateAction} from "react";

export const toFirstPage = (page: number, setPage: Dispatch<SetStateAction<number>>) => {
    if (page === 1) {
        return
    }
    setPage(() => 1)
};

export const leftPage = (page: number, setPage: Dispatch<SetStateAction<number>>) => {
    if (page === 1) {
        return
    }
    setPage((prev) => prev - 1)
};

export const rightPage = (page: number, lastPage: number, setPage: Dispatch<SetStateAction<number>>) => {
    if (page === lastPage) {
        return
    }
    setPage((prev) => prev + 1)
};

export const toLastPage = (page: number, lastPage: number, setPage: Dispatch<SetStateAction<number>>) => {
    if (page === lastPage) {
        return
    }
    setPage(() => lastPage)
};
