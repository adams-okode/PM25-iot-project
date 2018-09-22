package com.iot.app.iotapp.DataLayer;

import java.time.LocalDateTime;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

/**
 * Reading
 */
@Entity
@Table(name = "readings")
public class Reading {
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private Long sensor_id;
    private Float value;
    private LocalDateTime created_at;
    private LocalDateTime updated_at;

    public Reading() {

    }

    public Reading(Long sensor_id, Float value) {
        super();
        this.sensor_id = sensor_id;
        this.value = value;

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

}