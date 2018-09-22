package com.iot.app.iotapp.Requests;

/**
 * RoomRequest
 */
public class RoomRequest {

    private String name;
    private Integer walls;
    private String status;


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

}