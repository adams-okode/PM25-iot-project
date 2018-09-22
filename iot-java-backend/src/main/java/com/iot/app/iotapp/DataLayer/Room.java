package com.iot.app.iotapp.DataLayer;

import java.time.LocalDateTime;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;

@Entity
@Table(name = "rooms")
public class Room {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;
    private String name;
    private Integer walls;
    private String status;

    @OneToMany
    private List<PM25> sensor;

    @OneToMany
    private List<Wall> actual_wall;

    private LocalDateTime created_at;
   
    private LocalDateTime updated_at;

    public Room() {

    }

    public Room(String name, Integer walls, String status) {
        super();
        this.name = name;
        this.status = status;
        this.walls = walls;
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
     * @return String return the name
     */
    public String getName() {
        return name;
    }

    /**
     * @param name the name to set
     */
    public void setName(String name) {
        this.name = name;
    }

    /**
     * @return String return the status
     */
    public String getStatus() {
        return status;
    }

    /**
     * @param status the status to set
     */
    public void setStatus(String status) {
        this.status = status;
    }

  

    /**
     * @return Integer return the walls
     */
    public Integer getWalls() {
        return walls;
    }

    /**
     * @param walls the walls to set
     */
    public void setWalls(Integer walls) {
        this.walls = walls;
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