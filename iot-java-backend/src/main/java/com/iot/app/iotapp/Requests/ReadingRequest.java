package com.iot.app.iotapp.Requests;

/**
 * ReadingRequest
 */
public class ReadingRequest {

    private Long sensor_id;
    private Float value;

    private Integer x;
    private Integer y;


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


    /**
     * @return Integer return the x
     */
    public Integer getX() {
        return x;
    }

    /**
     * @param x the x to set
     */
    public void setX(Integer x) {
        this.x = x;
    }

    /**
     * @return Integer return the y
     */
    public Integer getY() {
        return y;
    }

    /**
     * @param y the y to set
     */
    public void setY(Integer y) {
        this.y = y;
    }

}