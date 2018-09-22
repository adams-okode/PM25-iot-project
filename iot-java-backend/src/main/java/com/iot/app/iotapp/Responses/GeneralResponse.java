package com.iot.app.iotapp.Responses;

/**
 * GeneralResponse
 */
public class GeneralResponse<T> {

    private Integer status_code;
    private T data;
    private String message;

    public GeneralResponse() {

    }

    public GeneralResponse(Integer status_code, T data, String message) {
        super();
        this.status_code = status_code;
        this.data = data;
        this.message = message;

    }

    /**
     * @return Integer return the status_code
     */
    public Integer getStatus_code() {
        return status_code;
    }

    /**
     * @param status_code the status_code to set
     */
    public void setStatus_code(Integer status_code) {
        this.status_code = status_code;
    }

    /**
     * @return T return the data
     */
    public T getData() {
        return data;
    }

    /**
     * @param data the data to set
     */
    public void setData(T data) {
        this.data = data;
    }

    /**
     * @return String return the message
     */
    public String getMessage() {
        return message;
    }

    /**
     * @param message the message to set
     */
    public void setMessage(String message) {
        this.message = message;
    }

}
