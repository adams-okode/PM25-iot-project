package com.iot.app.iotapp.DataLayer;

import java.util.List;
import com.fasterxml.jackson.annotation.JsonManagedReference;

import org.springframework.data.annotation.Id;
import org.springframework.data.mongodb.core.mapping.DBRef;
import org.springframework.data.mongodb.core.mapping.Document;

@Document(collection ="sensors")
public class PM25 {
    @Id
    private Long id;

    @DBRef
    private Room room;

    private String tag;
    private Integer x2;
    private Integer y2;

    @DBRef
    @JsonManagedReference
    private List<Reading> reading;
    public PM25() {

    }

    public PM25(Room room, String tag, Integer x2, Integer y2) {
        super();
        this.room = room;
        this.tag = tag;
        this.x2 = x2;
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
     * @return String return the tag
     */
    public String getTag() {
        return tag;
    }

    /**
     * @param tag the tag to set
     */
    public void setTag(String tag) {
        this.tag = tag;
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


    /**
     * @return List<Reading> return the reading_id
     */
    public List<Reading> getReading() {
        return reading;
    }

    /**
     * @param reading_id the reading_id to set
     */
    public void setReading_id(List<Reading> reading) {
        this.reading = reading;
    }


    /**
     * @return Room return the room
     */
    public Room getRoom() {
        return room;
    }

    /**
     * @param room the room to set
     */
    public void setRoom(Room room) {
        this.room = room;
    }

}