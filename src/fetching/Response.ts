export type Response<T> = OnSuccess<T> | OnFailure

export type OnFailure = {
    error: string
}

export type OnSuccess<T> = {
    readonly [Property in keyof T]: T[Property]
}