package com.iot.app.iotapp.DataLayer;

import java.time.LocalDateTime;

import org.springframework.data.annotation.Id;


import com.fasterxml.jackson.annotation.JsonBackReference;

import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

/**
 * Reading
 */
@Document( collection ="readings")
public class Reading {
    @Id
   
    private Long id;

    @DBRef
    @JsonBackReference
    private PM25 sensor;

    private Integer x;
    private Integer y;

    private Float value;
    private LocalDateTime created_at;
    private LocalDateTime updated_at;

    public Reading() {

    }

    public Reading(PM25 sensor, Float value, Integer x, Integer y) {
        super();
        this.sensor = sensor;
        this.value = value;
        this.x = x;
        this.y = y;

    }

    /**
     * @return Long return the id
     */
    public Long getId() {
        return id;
    }

    /**
     * @param id the id to set
     */
    public void setId(Long id) {
        this.id = id;
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
     * @return LocalDateTime return the created_at
     */
    public LocalDateTime getCreated_at() {
        return created_at;
    }

    /**
     * @param created_at the created_at to set
     */
    public void setCreated_at(LocalDateTime created_at) {
        this.created_at = created_at;
    }

    /**
     * @return LocalDateTime return the updated_at
     */
    public LocalDateTime getUpdated_at() {
        return updated_at;
    }

    /**
     * @param updated_at the updated_at to set
     */
    public void setUpdated_at(LocalDateTime updated_at) {
        this.updated_at = updated_at;
    }

    /**
     * @return PM25 return the sensor
     */
    public PM25 getSensor() {
        return sensor;
    }

    /**
     * @param sensor the sensor to set
     */
    public void setSensor(PM25 sensor) {
        this.sensor = sensor;
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