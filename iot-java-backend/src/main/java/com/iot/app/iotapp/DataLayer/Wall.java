package com.iot.app.iotapp.DataLayer;


import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

/**
 * Wall
 */
@Document(collection = "walls")
public class Wall {
    @Id
    private Long id;

    @DBRef
    private Room room;

    private Integer x1;
    private Integer y1;
    private Integer x2;
    private Integer y2;

    public Wall() {

    }

    public Wall(Room room, Integer x1, Integer y1, Integer x2, Integer y2) {
        super();
        this.room = room;
        this.x1 = x1;
        this.x2 = x2;
        this.y1 = y1;
        this.y2 = y2;

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
     * @return Long return the room
     */
    public Room getroom() {
        return room;
    }

    /**
     * @param room the room to set
     */
    public void setroom(Room room) {
        this.room = room;
    }

    /**
     * @return Integer return the x1
     */
    public Integer getX1() {
        return x1;
    }

    /**
     * @param x1 the x1 to set
     */
    public void setX1(Integer x1) {
        this.x1 = x1;
    }

    /**
     * @return Integer return the y1
     */
    public Integer getY1() {
        return y1;
    }

    /**
     * @param y1 the y1 to set
     */
    public void setY1(Integer y1) {
        this.y1 = y1;
    }

    /**
     * @return Integer return the x2
     */
    public Integer getX2() {
        return x2;
    }

    /**
     * @param x2 the x2 to set
     */
    public void setX2(Integer x2) {
        this.x2 = x2;
    }

    /**
     * @return Integer return the y2
     */
    public Integer getY2() {
        return y2;
    }

    /**
     * @param y2 the y2 to set
     */
    public void setY2(Integer y2) {
        this.y2 = y2;
    }

}