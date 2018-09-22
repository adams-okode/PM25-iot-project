package com.iot.app.iotapp.Requests;

/**
 * ReadingRequest
 */
public class ReadingRequest {

    private Long sensor_id;
    private Float value;

    public ReadingRequest() {

    }

    public ReadingRequest(Long sensor_id, Float value) {
        super();
        this.sensor_id = sensor_id;
        this.value = value;

    }

    /**
     * @return Long return the sensor_id
     */
    public Long getSensor_id() {
        return sensor_id;
    }

    /**
     * @param sensor_id the sensor_id to set
     */
    public void setSensor_id(Long sensor_id) {
        this.sensor_id = sensor_id;
    }

    /**
     * @return Float return the value
     */
    public Float getValue() {
        return value;
    }

    /**
     * @param value the value to set
     */
    public void setValue(Float value) {
        this.value = value;
    }

}